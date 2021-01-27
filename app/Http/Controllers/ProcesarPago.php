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

            $respPlace = array(
                'requestId' => $response->requestId(),
                'reference' => $reference,
                'processUrl' => $response->processUrl()
            );

            $actualicar_orden = Ordenes::where("id", $id)->update($respPlace);

            echo json_encode($respPlace);
        } else {

            $respPlace = $response->status()->message();

            echo json_encode($respPlace);
        }
    }

    public function respuestaPlaceToPay(Request $request)
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

        $referencia = $request->get("reference");

        $orden = Ordenes::where("reference", $referencia)->get();

        foreach ($orden as $key => $value) {

            $requestId = $value['requestId'];
        }

        $response = $placetopay->query($requestId);

        if ($response->isSuccessful()) {

            if ($response->status()->isApproved()) {
         
            }

            $datos = ['status' => $response->payment[0]->status()->status(),
                      'message' => $response->payment[0]->status()->message(),
                      'date_trans' => $response->payment[0]->status()->date(),
                      'method' => $response->payment[0]->paymentMethodName(),
                      'ref_int' => $response->payment[0]->internalReference(),
                      'bank' => $response->payment[0]->issuerName()
                    ];

            $actualicar_orden = Ordenes::where("reference", $referencia)->update($datos);

            return json_encode($actualicar_orden);
     
        } else {

            print_r($response->status()->message() . "\n");

        }
    }
}
