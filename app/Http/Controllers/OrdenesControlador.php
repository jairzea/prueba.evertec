<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Ordenes;
use App\VistaOrdenesProductos;

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
     * Mostrar la vista de ordenes y productos
     */
    public function vistaOrdenesProductos()
    {
        $ordenes_productos = VistaOrdenesProductos::all();

        if(count($ordenes_productos) > 0){

            $respuesta = $ordenes_productos;

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
     * Consultar las ordenes de un usuario
     */
    public function ordenesDeUsuario(Request $request)
    {
        $email = trim($request->input('email'));

        $ordenes_usr = VistaOrdenesProductos::where("email", $email)->get();

        if(count($ordenes_usr) > 0){

            foreach($ordenes_usr as $key => $value){

                $data['id_orden'] = $value['id_orden'];
                $data['nombre'] = $value['nombre'];
                $data['telefono'] = $value['telefono'];
                $data['email'] = $value['email'];
                $data['referencia_orden'] = $value['referencia_orden'];
                $data['nombre_producto'] = $value['nombre_producto'];
                $data['precio_producto'] = $value['precio_producto'];
                $data['estado'] = $value['estado'];
                $data['imagen_producto'] = $value['imagen_producto'];
                $data['created_at'] = $value['created_at'];
                $data['name'] = $value['name'];
                $data['id'] = $value['id'];

                if($value['estado'] == 'APPROVED'){

                    $data['url_pago'] ='<div><a style="color: green" href="'.$value['url_pago']. '">Url de pago</a></div>';

                    $data['boton'] = '<div class="btn-group"><button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button></div>';

                }else{

                    $data['url_pago'] ='<div><a style="color: red" href="'.$value['url_pago']. '">Url de pago</a></div>';

                    $data['boton'] = '<div class="btn-group"><button class="btn btn-warning btn-sm btnReintentarPago" id_cliente='.$value['id_cliente'].' llave_secreta='.$value['llave_secreta'].'><i class="fa fa-refresh"></i></button></div>';
                }
                

                $respuesta[] = $data;
            }

        }else{

            $respuesta = array(

                "status" => 400,
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
            ->select('orders.customer_name AS nombre', 'orders.customer_email AS email', 'products.name AS nombre_producto', 'products.description AS descripcion_producto', 'products.price AS precio_producto', 'products.img AS imagen_producto', 'orders.id AS id_orden', 'orders.customer_mobile AS telefono')
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
                    "detalle" => "Registro con errores, verifique la información enviada"
        
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
                    "detalle" => "Orden registrada",
                    "credenciales"=>array("id_cliente" => $id_cliente,
                                          "llave_secreta" => $llave_secreta)
        
                );

                return json_encode($respuesta, true);

            }

        }else{

            $error = array(

                "status" => 404,
                "detalle" => "Registro con errores - datos vacios"
    
            );

            return json_encode($error, true);
        }

    }
}
