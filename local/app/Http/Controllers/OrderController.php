<?php

namespace App\Http\Controllers;

use App\Packagepayment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function verify()
    {
//        $order = Order::findorfail(2);
//        $price = $order->amount;
        $price='3000';
        $payment = new Packagepayment($price);
        $result = $payment->doPayment();

        if ($result->Status == 100) {
            return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }
}
