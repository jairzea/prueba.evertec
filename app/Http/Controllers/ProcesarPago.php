<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Dnetix\Redirection\Contracts\Gateway;
use Dnetix\Redirection\PlacetoPay;


class ProcesarPago extends Controller
{
    // Creación del objeto Pacetopay
    public function pagoPlaceToPay()
    {

        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://dev.placetopay.com/redirection/',
            'rest' => [
                'timeout' => 45,
                'connect_timeout' => 30,
            ]
        ]);

        //Creating a random reference for the test
        $reference = 'TEST_' . time();

        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'USD',
                    'total' => 120,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'http://example.com/response?reference=' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];


        $response = $placetopay->request($request);
        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            // Redirect the client to the processUrl or display it on the JS extension
            //header('Location: ' . $response->processUrl());
            var_dump($response->processUrl());
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }


    }
}
