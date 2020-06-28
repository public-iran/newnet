<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function verify(Request $request)
    {
        $order = Order::findorfail(2);
        $price = $order->amount;

        $mobile = session()->get('mobile_number3');

        if(Auth::check()){
            $user = User::where('hometell', Auth::user()->hometell)->first();
        }else{
            $user = User::where('hometell', $mobile)->first();
        }

        $payment = new Payment($price);
        $result = $payment->verifyPayment($request->Authority, $request->Status);

        if ($result) {
            $date = date("Y-m-d H:i:s", time());
            $userId = $user->id;
            $user->payment = 1;
            $user->time_expiration = $date;

            $time = strtotime($date);
            if($user->ts == 1){
                $user->nexttime = date("Y-m-d H:i:s", strtotime("+1 month", $time));
            }else if($user->ts == 12){
                $user->nexttime = date("Y-m-d H:i:s", strtotime("+12 month", $time));
            }
            $user->save();

            $newPayment = new Payment($price);
            $newPayment->authority = ltrim($request->Authority, '0');;
            $newPayment->status = $request->Status;
            $newPayment->RefId = $result->RefID;
            $newPayment->user_id = $userId;
            $newPayment->price = $price;
            $newPayment->title = 'شارژ اکانت';
            $newPayment->save();

            session()->put('success_payment', 'پرداخت با موفقیت انجام شد به سامانه تاچ ملک خوش آمدید.');
            return redirect('/login');

        } else {

            $userId = $user->id;
            $user->payment = 0;
            $user->save();

            $newPayment = new Payment($price);
            $newPayment->authority = ltrim($request->Authority, '0');;
            $newPayment->status = $request->Status;
            $newPayment->RefId = '-';
            $newPayment->user_id = $userId;
            $newPayment->price = $price;
            $newPayment->title = 'شارژ اکانت';
            $newPayment->save();

            session()->put('error_payment', 'متاسفانه پرداخت شما انجام نشد! لطفا مجددا امتحان فرمایید.');
            return redirect('/login');
        }
    }

    public function payments()
    {
        $payments = Payment::where('user_id', Auth::id())->paginate(10);
        return view('admin.payments.index', compact(['payments']));
    }

    public function getprice(Request $request)
    {
        $order = Order::findorfail(2);
        return view('admin.payments.price', compact(['order']));
    }

    public function setprice(Request $request)
    {
        $order = Order::findorfail(2);
        $order->amount = $request->price;
        $order->save();
        return response()->json([
            'message' => $order->amount
        ]);
    }

}
