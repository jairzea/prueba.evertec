<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://apirest-tienda.evertec/registro_ordenes',
        'http://apirest-tienda.evertec/registro_productos',
        'http://apirest-tienda.evertec/editar_producto',
        'http://apirest-tienda.evertec/borrar_producto/*',
        'http://apirest-tienda.evertec/orden_activa',
        'http://apirest-tienda.evertec/pagar',
        'http://apirest-tienda.evertec/respuestaPago'
    ];
}
