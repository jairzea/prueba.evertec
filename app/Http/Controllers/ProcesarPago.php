<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Dnetix\Redirection\Contracts\Gateway;
use Dnetix\Redirection\PlacetoPay;
use App\Ordenes;


class ProcesarPago extends Controller
{
    // Creación del objeto Pacetopay
    public function pagoPlaceToPay(Request $request)
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

        $id = $request->input("id_orden");

        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => $request->input("descripcion"),
                'amount' => [
                    'currency' => 'COP',
                    'total' => $request->input("precio"),
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'http://apirest-tienda.evertec/respuestaPago?reference=' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($request);

        if ($response->isSuccessful()) {

            $respPlace = array('requestId' => $response->requestId(),
                               'processUrl' => $response->processUrl());

            $actualicar_orden = Ordenes::where("id", $id)->update($respPlace);

            echo json_encode($respPlace);

        } else {

            $respPlace = $response->status()->message();

            echo json_encode($respPlace);
        }


    }

    public function respuestaPlaceToPay(Request $request)
    {
        $respPlace = array('reference' => $request->get("requestId"));

        $request = $request->get("requestId");

        $actualizar_orden = Ordenes::where("requestId", $request)->update($respPlace);

        return json_encode($actualizar_orden);

    }
}
