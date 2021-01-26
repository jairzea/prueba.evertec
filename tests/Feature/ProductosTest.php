<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductosTest extends TestCase
{
    /** @test */
    public function testMostrarProductos()
    {
        $this->get('/productos')
             ->assertStatus(200)
             ->assertSee('detalles')
             ->assertSee('name')
             ->assertSee('description')
             ->assertSee('price')
             ->assertSee('sales')
             ->assertSee('id');
    }

    /** @test */
    function testRegistroProductos()
    {
        $this->post('/registro_productos', [
            "nombre" => "Prueba de producto",
            "descripcion"  => "Esto es un producto de prueba",
            "precio" => "5000000",
        ])
        ->assertStatus(200)
        ->assertSee('Producto registrado exitosamente');

        $this->assertDatabaseHas('products', [
            "name" => "Prueba de producto",
            "description"  => "Esto es un producto de prueba",
            "price" => "5000000",
        ]);
    }

    /** @test */
    function testActualizarProductos()
    {
        $this->put('/editar_producto/3', [
            "nombre" => "Prueba editado",
            "descripcion"  => "Este producto ha sido editado por una prueba unitaria",
            "precio" => "5500000",
        ])
             ->assertStatus(200)
             ->assertSee('Producto actualizado exitosamente');
        
        $this->assertDatabaseHas('products', [
            "name" => "Prueba editado",
            "description"  => "Este producto ha sido editado por una prueba unitaria",
            "price" => "5500000",
        ]);
    }

    /** @test */
    function testBorrarProductos()
    {
        $this->delete('/borrar_producto/9')
             ->assertStatus(200)
             ->assertSee('Se ha borrado el producto con exito');
    }

}
