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
    function testRegistroOrdenes()
    {
        $this->post('/registro_ordenes', [
            "nombre" => "Prueba de registro",
            "email"  => "prueba@mail.com",
            "telefono" => "3217098185",
            "id_producto" => "2"
        ])
        ->assertStatus(200)
        ->assertSee('Orden registrada');

        $this->assertDatabaseHas('orders', [
            "customer_name" => "Prueba de registro",
            "customer_email"  => "prueba@mail.com",
            "customer_mobile" => "3217098185",
            "id_product" => "2",
            "status" => "CREATED"
        ]);
    }

    /** @tests */
    function testVerResumenOrden()
    {
        $this->get('/orden_activa', [
            "Authorization" => 'Basic YTJ5YTEwYWUuQ21PZFdhaUExVmg1eGhPTlFYUy5TSWhnVURiakQ5RWNLclJWeGZRbGJlNkFiczkxTEphOm8yeW8xMm9YVWRUa01vSXFTZFFaeVFBS3h5V1Quc1RJWWs3SG8zNXpQVFdldDFyeWJObXVwcmNqcDZZQw=='
        ])
             ->assertStatus(200)
             ->assertSee('Orden valida');
    }
}
