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
        $this->post('/pagar')
             ->assertStatus(200);
    }
}
