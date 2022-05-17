<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    function create(Request $request) {
        $data = json_decode($request->getContent(), true);
//        return 'sdjnsakndsokn';
//        return $price;
        $provider = new PayPalClient;
//        return $data;
        // Through facade. No need to import namespaces
//        $provider = \PayPal::setProvider();
//        dd(config('paypal'));
        $token = $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
//        dd($token);

//        dd($token);
        $provider->setAccessToken($token);
        $price = Order::getDonationPrice($data['value']);


        $order= $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
              [
                "amount" => [
                  "currency_code" => "USD",
                  "value" => $price,
                  "description" => "ojhsdoikdasjniok"
                ]
              ]
            ]
        ]);
//            return $order;

//        $order = $provider->createOrder($data);
//        dd($order);
        Order::create(['amount' => $price,'user_id' => auth()->id(),]);

        return response()->json($order);
    }

//    function create(Request $request) {
//        $data = json_decode($request->getContent(), true);
////        return 'sdjnsakndsokn';
//
//        $provider = new PayPalClient;
//
//        // Through facade. No need to import namespaces
////        $provider = \PayPal::setProvider();
////        dd(config('paypal'));
//        $token = $provider->setApiCredentials(config('paypal'));
//        $token = $provider->getAccessToken();
////        dd($token);
//
////        dd($token);
//        $provider->setAccessToken($token);
//        $data = json_decode('{
//            "intent": "CAPTURE",
//            "purchase_units": [
//              {
//                "amount": {
//                  "currency_code": "USD",
//                  "value": 100.00,
//                  "description": "ojhsdoikdasjniok"
//                }
//              }
//            ]
//        }', true);
////        dd($data);
//
//        $order = $provider->createOrder($data);
////        dd($order);
//        return response()->json($order);
//    }

    function capture(Request $request) {
//        dd($request);
        $data = json_decode($request->getContent(), true);
//        return $request;
        $orderId = $data['orderId'];

        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
//        dd($token);
        $provider->setAccessToken($token);
        $result =  $provider->capturePaymentOrder($orderId);


        return response()->json($result);



    }
}
