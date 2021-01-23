<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Ordenes;
use App\Productos;

class OrdenesControlador extends Controller
{
    /**
     * Mostrar cuando no se especifica un ENDPOINT
     */
    public function default()
    {
        $respuesta = array(

            "detalle" => "no encontrado"

        );

        return json_encode($respuesta, true);
    }

    /**
     * Mostrar las ordenes
     */
    public function index()
    {
        $ordenes = Ordenes::all();

        if(count($ordenes) > 0){

            $respuesta = array(

                "status" => 200,
                "total_registros" => count($ordenes),
                "detalles"=>$ordenes

            );

        }else{

            $respuesta = array(

                "status" => 200,
                "total_registros" => 0,
                "detalles"=>'No hay ordenes registradas'
    
            );
        }

        return json_encode($respuesta, true);
    }
    
    /**
     * Mostrar resumen de una orden
     */
    public function show(Request $request)
    {
        $token = $request->header('Authorization');
        $orden_activa = Ordenes::where("token", $token)->get();

        if(count($orden_activa) > 0){

            $orden = DB::table('orders')
            ->join('products','orders.id_product', '=', 'products.id')
            ->where('orders.token' , '=', $token)
            ->select('orders.customer_name AS nombre', 'orders.customer_email AS email', 'products.name AS nombre_producto', 'products.description AS descripcion_producto', 'products.price AS precio_producto', 'orders.id AS id_orden')
            ->get();

            $respuesta = array(

                "status" => 200,
                "detalle" => "Orden valida",
                "orden" => $orden
    
            );

        }else{

            $respuesta = array(

                "status" => 404,
                "detalle" => "Orden no valida"
    
            );
        }

        return json_encode($respuesta, true);

    }
    
    /**
     * Crear una orden en el sistema
     */
    public function store(Request $request)
    {
        
        // Recoger datos
        $datos = array("customer_name" => trim($request->input("nombre")),
                       "customer_email" => trim($request->input("email")),
                       "customer_mobile" => trim($request->input("telefono")),
                       "id_product" => trim($request->input("id_producto")),
                       "status" => trim("CREATED")
                    );

        // Validar datos vacios
        if(isset($datos) && !empty($datos)){

            // Validar datos
            $validator = Validator::make($datos, [
                'customer_name' => 'required|string|max:80',
                'customer_email' => 'required|string|email|max:120',
                'customer_mobile' => 'required|string|max:40',
                'id_product' => 'required|string|max:40',
                'status' => 'required|string|max:20'
            ]);

            // Si falla la validación
            if ($validator->fails()) {
               
                $error = array(

                    "status" => 404,
                    "detalle" => "Registro con errores"
        
                );

                return json_encode($error, true);
            
            // Si no falla la validación
            }else{

                // Generamos el id_cliente y la llave_secreta
                $id_cliente = str_replace("$", "a", Hash::make($datos["customer_name"].$datos["customer_email"].$datos["customer_mobile"]));
                $llave_secreta = str_replace("$","o", Hash::make($datos["customer_email"].$datos["customer_name"].$datos["customer_mobile"], ['rounds' => 12]));

                $token = "Basic ".base64_encode($id_cliente.":".$llave_secreta);

                $orden = new Ordenes();
                $orden -> customer_name = $datos["customer_name"];
                $orden -> customer_email = $datos["customer_email"];
                $orden -> customer_mobile = $datos["customer_mobile"];
                $orden -> id_product = $datos["id_product"];
                $orden -> status = $datos["status"];
                $orden -> id_cliente = $id_cliente;
                $orden -> llave_secreta = $llave_secreta;
                $orden -> token = $token;

                $orden -> save();

                $respuesta = array(

                    "status" => 200,
                    "detalle" => "Registro exitoso",
                    "credenciales"=>array("id_cliente" => $id_cliente,
                                          "llave_secreta" => $llave_secreta)
        
                );

                return json_encode($respuesta, true);

            }

        }else{

            $error = array(

                "status" => 404,
                "detalle" => "Registro con errores"
    
            );

            return json_encode($error, true);
        }

    }
}
