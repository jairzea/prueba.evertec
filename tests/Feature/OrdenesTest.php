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
            "Authorization" => 'Basic YTJ5YTEwYUwuTmNEYkR1RHk2UWEuSFlkWGZJS3VXSjlKY3phVzFHMFA5Y3dUMEJSQVBrcVFtOXVGanZhOm8yeW8xMm9COFBQQ1hjOGQ3MzdJakVEcWlXLmcuSkEvcThZVXZlTFR5dVRjdXduTFY0Uk5KZkVEMGlRcQ=='
        ])
             ->assertStatus(200)
             ->assertSee('Orden valida');
    }
}
