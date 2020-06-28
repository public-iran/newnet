<?php

namespace App\Http\Controllers\AdminB;

use App\Balanceprice;
use App\Directselling;
use App\Payment;
use App\User;
use App\Wallet;
use App\Allreport;
use App\Walletsreport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminWalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet=Wallet::where('user_id',Auth::id())->first();
        $directselling=Directselling::where('user_id',Auth::id())->first();
        $balanceprice=Balanceprice::where('user_id',Auth::id())->first();
        $walletsreports=Walletsreport::where(['wallet_id'=>$wallet->id,'user_id'=>Auth::id()])->orderby('id','desc')->get();
        $reports=Allreport::where(['user_id'=>Auth::id()])->orderby('id','desc')->get();
        return view('adminbizness.wallet.index',compact(['wallet','directselling','balanceprice','walletsreports','reports']));
    }

    public function Account_charging(Request $request)
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();
        session()->put('price_Account_charging_' . $wallet->token, $request->price);


        $payment = new Payment($request->price, '/adminb/wallet/Account_charging/payment-verify');
        $result = $payment->doPayment();


        if ($result->Status == 100) {
            return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }

    public function payment_verify_Account_charging()
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();

        $wallets_report = new Walletsreport();
        $wallets_report->user_id = Auth::id();
        $wallets_report->wallet_id = $wallet->id;
        $wallets_report->Authority = ltrim($_GET['Authority'], '0');
        $wallets_report->description = "شارژ کیف پول";
        $price = session()->get('price_Account_charging_' . $wallet->token);
        $wallets_report->price = $price;
        if ($_GET['Status'] == "OK") {
            $wallets_report->status = "PAY";
            $wallet->price = $wallet->price + $price;
            $wallet->save();
            session()->put('PAY_Account_charging_s', "شارژ حساب شما با موفقیت انجام شد");
        } elseif ($_GET['Status'] == "NOK") {
            $wallets_report->status = "UNPAYD";
            session()->put('PAY_Account_charging_d', "شارژ حساب شما با خطا مواجه شد");
        }
        $wallets_report->save();
        return redirect('/adminb/wallet');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
