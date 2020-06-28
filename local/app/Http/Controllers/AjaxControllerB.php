<?php

namespace App\Http\Controllers;

use App\Balanceprice;
use App\Directselling;
use App\Package;
use App\Payment;
use App\User;
use App\Wallet;
use App\Walletsreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AjaxControllerB extends Controller
{
    public function number_format_price(Request $request)
    {
        echo number_format($request->price);
    }

    public function check_token_wallet(Request $request)
    {
        $token = $request->input('token');
        $wallet = Wallet::where('token', $token)->first();
        if ($wallet) {
            if ($wallet->user_id != Auth::id()) {
                $user = User::find($wallet->user_id);
                if ($user) {
                    session()->put('check_token_wallet', $token);
                    return response()->json([
                        "name" => $user->name,
                    ]);
                } else {
                    echo 'notok';
                }

            } else {
                echo 'notok';
            }

        } else {
            echo 'notok';
        }

    }

    public function check_pass_wallet(Request $request)
    {
        $user = User::findorfail(Auth::id());
        if (password_verify($request->password, $user->password)) {
            echo 'ok';
        } else {
            echo 'notok';
        }
    }

    public function check_mobile_wallet(Request $request)
    {
        $user = User::findorfail(Auth::id());
        if ($request->mobile == $user->mobile) {
            $code = rand(100000, 999999);
            $username = "udreams";
            $password = 'fardabia20002000';
            $from = "+983000505";
            $pattern_code = "30a206hbb9";
            $to = array($request->input('mobile'));
            $input_data = array("verification-code" => $code);
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            $user->verifire_code = $code;
            $user->save();
        } else {
            echo 'no-mobil';
        }
    }

    public function check_code_wallet(Request $request)
    {
        $user = User::findorfail(Auth::id());
        if ($request->code == $user->verifire_code) {
            echo 'ok';
        } else {
            echo 'notok';
        }
    }

    public function check_answer_wallet(Request $request)
    {
        $user = User::findorfail(Auth::id());
        if ($request->answer == $user->answer) {
            echo 'ok';
        } else {
            echo 'notok';
        }
    }

    public function send_price_wallet(Request $request)
    {
        if ($request->price>=1000){
            if ($request->price<=5000000){
                $token = session()->get('check_token_wallet');
                $wallet = Wallet::where('token', $token)->first();
                if ($wallet) {
                    if ($wallet->user_id != Auth::id()) {
                        $user = User::find($wallet->user_id);
                        if ($user) {
                            $user_wallet = Wallet::where('user_id', Auth::id())->first();
                            if ($user_wallet->price >= $request->price) {
                                $user_wallet->price = $user_wallet->price - $request->price;
                                $user_wallet->save();


                                $wallet->price = $wallet->price + $request->price;
                                $wallet->save();


                                $walletsreport = new Walletsreport();
                                $walletsreport->user_id = Auth::id();
                                $walletsreport->wallet_id = $user_wallet->id;
                                $walletsreport->description = "انتقال پول به " . $user->name;
                                $walletsreport->price = $request->price;
                                $walletsreport->status = "PAY";
                                $walletsreport->save();


                                $username = "udreams";
                                $password = 'fardabia20002000';
                                $from = "+983000505";
                                $pattern_code = "86fy05dqj0";
                                $to = array(Auth::user()->mobile);
                                $input_data = array("name" => Auth::user()->name,"price"=>$request->price,"namee"=>$user->name);
                                $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                                $handler = curl_init($url);
                                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                                curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($handler);


                                session()->put('send_price_wallet_success', 'با موفقیت انتقال یافت');
                                echo '/adminb/wallet';

                            } else {
                                echo 'nomony';
                            }

                        }else{
                            echo 'notok';
                        }
                    }else{
                        echo 'notok';
                    }
                }else{
                    echo 'notok';
                }
            }else{
                echo 'maximum';
            }

        }else{
            echo 'minimum';
        }


    }

    public function check_return_code_wallet(Request $request)
    {
        $user = User::findorfail(Auth::id());
        if ($request->mobile == $user->mobile) {
            $code = rand(100000, 999999);
            $username = "udreams";
            $password = 'fardabia20002000';
            $from = "+983000505";
            $pattern_code = "30a206hbb9";
            $to = array($request->input('mobile'));
            $input_data = array("verification-code" => $code);
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            $user->verifire_code = $code;
            $user->save();
        } else {
            echo 'no-mobil';
        }
    }

    public function Money_transfer_wallet(Request $request)
    {
        $status = $request->status;
        $wallet = Wallet::where('user_id', Auth::id())->first();
        $pay = 'no';
        if ($status == 'direct') {
            $direct = Directselling::where('user_id', Auth::id())->first();
            if ($direct and $direct->price!=0) {

                $walletsreport = new Walletsreport();
                $walletsreport->user_id = Auth::id();
                $walletsreport->price = $direct->price;
                $walletsreport->description = "واریزی از معرفی مستقیم";
                $walletsreport->status = "PAY";
                $walletsreport->wallet_id = $wallet->id;
                $walletsreport->save();

                $wallet->price = $wallet->price + $direct->price;
                $wallet->total_price = $wallet->total_price + $direct->price;
                $wallet->save();
                $direct->price=0;
                $direct->save();
                $pay = 'yes';
            }
        }
        if ($status == "balance") {
            $balance = Balanceprice::where('user_id', Auth::id())->first();
            if ($balance and $balance->price!=0) {

                $walletsreport = new Walletsreport();
                $walletsreport->user_id = Auth::id();
                $walletsreport->price = $balance->price;
                $walletsreport->description = "واریزی از تعادل";
                $walletsreport->status = "PAY";
                $walletsreport->wallet_id = $wallet->id;
                $walletsreport->save();

                $wallet->price = $wallet->price + $balance->price;
                $wallet->total_price = $wallet->total_price + $balance->price;
                $wallet->save();
                $balance->price=0;
                $balance->save();
                $pay = 'yes';
            }

        }
        return response()->json([
            'price' => number_format($wallet->price),
            'total_price' => number_format($wallet->total_price),
            'pay' => $pay,
        ]);
    }


    public function selfupdateuser(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255|min:3|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/',
//                'homename' => 'required|string|max:255|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/',
//                'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
//                'melicode' => 'required|digits:10|numeric',
                'ostan' => 'required',
                'city' => 'required',
//                'username' => 'required|string|max:255|min:3|regex:/^[A-Za-z][A-Za-z0-9]*$/|unique:users',
//                'password' => 'required|string|min:7|confirmed',
            ],
            [
//                'password.min' => 'رمز عبور باید حداقل 7 کاراکتر باشد.',
//                'password.confirmed' => 'رمز عبور وارد شده یکسان نیست.',
//                'username.unique' => 'این نام کاربری از قبل وجود دارد.',
                'name.required' => 'نام و نام خانوادگی را وارد کنید.',
                'name.regex' => 'نام و نام خانوادگی نمی تواند عدد یا حروف لاتین باشد.',
//                'username.required' => 'نام کاربری را وارد کنید.',
//                'password.required' => 'رمز عبور را وارد کنید.',
                'name.min' => ' نام و نام خانوادگی باید حداقل 3 کاراکتر باشد.',
//                'username.min' => ' نام کاربری باید حداقل 3 کاراکتر باشد.',
//                'username.regex' => ' نام کاربری باید به صورت لاتین وارد شود.',
//                'mobile.digits' => ' شماره موبایل باید 11 رقم باشد.',
//                'mobile.required' => 'شماره موبایل را وارد کنید.',
//                'mobile.regex' => 'فرمت شماره موبایل صحیح نیست.',
//                'mobile.numeric' => 'لطفا مقدار عددی وارد کنید.',
//                'melicode.numeric' => 'لطفا مقدار عددی وارد کنید.',
//                'melicode.required' => 'کد ملی را وارد کنید.',
//                'melicode.digits' => ' کد ملی باید 10 رقم باشد.',
                'ostan.required' => ' استان خود را انتخاب کنید',
                'city.required' => ' شهر خود را انتخاب کنید',
            ]
        );

        $user = User::findorfail(Auth::id());
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->ostan = $request->ostan;
        $user->ostan_id = $request->ostan_id;
        $user->city_id = $request->city_id;
        $user->save();


        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function Change_status_user(Request $request)
    {
        $user=User::findorfail($request->user_id);
        $user->status=$request->status;
        $user->save();
        if ($request->status=="ACTIVE"){
            echo 'ACTIVE';
        }else{
            echo 'INACTIVE';
        }

    }

    public function uploadimageprofile(Request $request)
    {
        if(isset($request->id)){
            $user = User::findorfail($request->id);

            if(!empty($user->avatar)){
                if(file_exists(public_path($user->avatar))){
                    unlink(public_path($user->avatar));
                }
            }

            $file = $request->file('file');

            $name = time() . $file->getClientOriginalName() ;
            $file->move('images/user_profile/' . $request->id , $name);
            $user->avatar = 'images/user_profile/' . $request->id . '/' . $name;
            $user->save();

            return response()->json([
                'status' => asset($user->avatar)
            ]);

        }else{
            $user = User::findorfail(Auth::id());

            if(!empty($user->avatar)){
                if(file_exists(public_path($user->avatar))){
                    unlink(public_path($user->avatar));
                }
            }

            $file = $request->file('file');

            $name = time() . $file->getClientOriginalName() ;
            $file->move('images/user_profile/' . Auth::id() , $name);
            $user->avatar = 'images/user_profile/' . Auth::id() . '/' . $name;
            $user->save();

            return response()->json([
                'status' => asset($user->avatar)
            ]);

        }

    }

}
