<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdenesTest extends TestCase
{
    /** @test */
    function cargarRutaOrdenes()
    {
        $this->get('/ordenes')
             ->assertStatus(200)
             ->assertSee('detalles')
             ->assertSee('customer_name')
             ->assertSee('customer_email')
             ->assertSee('customer_mobile')
             ->assertSee('id_product')
             ->assertSee('status')
             ->assertSee('id')
             ->assertSee('id_cliente')
             ->assertSee('llave_secreta')
             ->assertSee('token');
    }

    /** @test */
    function cargarRutaRegistroOrdenes()
    {
        $this->post('/registro_ordenes', [
            "nombre" => "Lisney Hernandez",
            "email"  => "lisne@mail.com",
            "telefono" => "3217098185",
            "id_producto" => "2"
        ])
            ->assertStatus(200)
            ->assertSee('Registro exitoso');
    }
}
