<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoapClient;

class Payment extends Model
{
    private $MerchantID;
    private $Amount;
    private $Description;
    private $CallbackURL;

    public function __construct($amount=null,$back=null)
    {
        $this->MerchantID = '77eaacec-43c1-11e9-9459-000c295eb8fc'; //Required
        $this->Amount = $amount; //Amount will be based on Toman - Required
        $this->Description = 'وحدت رویاها'; // Required
        // $Email = 'UserEmail@Mail.Com'; // Optional
        // $Mobile = '09123456789'; // Optional
        $this->CallbackURL = 'https://imtproject.ir/'.$back; // Required
    }

    public function doPayment()
    {
        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $this->Amount,
                'Description' => $this->Description,
                // 'Email' => $Email,
                // 'Mobile' => $Mobile,
                'CallbackURL' => $this->CallbackURL,
            ]
        );
        return $result;
    }

    public function verifyPayment($authority, $status)
    {
        if ($status == 'OK') {

            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $authority,
                    'Amount' => $this->Amount,
                ]
            );

            return $result;
        }else{
            return false;
        }
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
