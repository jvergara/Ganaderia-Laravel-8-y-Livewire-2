<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WebpayPlusController extends Controller
{
    public function webpay_inicio(){
        return view('webpay.home');
    }

    public function webpay_pagar(){

        $amount = 2000;

        $response = Http::withHeaders([
            'Content-Type'          => 'application/json',
            'Tbk-Api-Key-Id'        => env('WEBPAY_ID'),
            'Tbk-Api-Key-Secret'    => env('WEBPAY_SECRET')
            ])->post(env('WEBPAY_URL'), [
                'buy_order'     => 'OC123456',
                'session_id'    => rand(0, 10000),
                'amount'        => $amount,
                'return_url'    => 'http://192.168.1.3/blog/public/webpay/respuesta',
                ]); 

        if($response->status()!=200)
        {
            die("error");
        }
        $datos = json_decode($response);
        return view('webpay.pagar', compact('datos'));
    }

    public function webpay_respuesta(){
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
            'Tbk-Api-Key-Secret'=>env('WEBPAY_SECRET')
        ])->put(env('WEBPAY_URL')."/".$_GET['token_ws'], [ ]);
        $datos = json_decode($response);
        #print_r($datos);exit;
        return view('webpay.respuesta', compact('datos'));
    }
}
