<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlacetopayTest extends TestCase
{
    /**
     * Probando URL de pago.
     *
     * @test
     */
    function cargarRutaPago()
    {
        $this->post('/pagar', [
            'descripcion' => "Prueba de registro, descripcion",
            'precio' => "10000"
        ])
             ->assertStatus(200);
    }

    /**
     * Probando URL de resuesta de pago.
     *
     * @test
     */
    function cargarRutaRespuestaPago()
    {
        $this->get('/respuestaPago',[
            'requestId' => '5676'
        ])
             ->assertStatus(200);
    }
}
