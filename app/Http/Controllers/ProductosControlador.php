<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Productos;

class ProductosControlador extends Controller
{
    /**
     * Mostrar los productos
     */
    public function index()
    {
        $productos = Productos::all();

        if(count($productos) > 0){

            $respuesta = array(

                "status" => 200,
                "total_registros" => count($productos),
                "detalles"=>$productos
    
            );

        }else{

            $respuesta = array(

                "status" => 200,
                "total_registros" => 0,
                "detalles"=>'No hay productos registrados'
    
            );
            
        }

        return json_encode($respuesta, true);
    }

    /**
     * Crear un producto en el sistema
     */
    public function store(Request $request)
    {
        
        // Recoger datos
        $datos = array("name" => trim($request->input("nombre")),
                       "description" => trim($request->input("descripcion")),
                       "price" => trim($request->input("precio"))
                      );

        // Validar datos vacios
        if(isset($datos) && !empty($datos)){

            // Validar datos
            $validator = Validator::make($datos, [
                'name' => 'required|string|max:80',
                'description' => 'required|string|max:255',
                'price' => 'numeric|required|min:10|max:99999999',
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

                $productos = new Productos();
                $productos -> name = $datos["name"];
                $productos -> description = $datos["description"];
                $productos -> price = $datos["price"];

                $productos -> save();

                $respuesta = array(

                    "status" => 200,
                    "detalle" => "Producto registrado exitosamente",
        
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

    /**
     * Editar un producto en el sistema
     */
    public function update($id, Request $request)
    {
        
        // Recoger datos
        $datos = array("name" => trim($request->input("nombre")),
                       "description" => trim($request->input("descripcion")),
                       "price" => trim($request->input("precio"))
                      );

        // Validar datos vacios
        if(isset($datos) && !empty($datos)){

            // Validar datos
            $validator = Validator::make($datos, [
                'name' => 'required|string|max:80',
                'description' => 'required|string|max:255',
                'price' => 'numeric|required|min:10|max:99999999',
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

                $producto = array("name" => $datos["name"],
                                   "description" => $datos["description"],
                                   "price" => $datos["price"]);

                $actualicar_producto = Productos::where("id", $id)->update($producto);

                $respuesta = array(

                    "status" => 200,
                    "detalle" => "Producto actualizado exitosamente",
        
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

    /**
     * Eliminar un producto en el sistema
    */
    public function destroy($id, Request $request){

        $producto = Productos::where("id", $id)->delete();

        $respuesta = array(

            "status" => 200,
            "detalle" => "Se ha borrado el producto con exito"

        );

        return json_encode($respuesta, true);

    }
}
