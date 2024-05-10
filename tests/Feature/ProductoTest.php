<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_lista_productos(): void
    {
        $response = $this->get('/producto');
        
        $response->assertStatus(200)
            ->assertSee('Lista de productos');
    }

    public function test_registrar_producto(): void
    {
        $this->actingAs($user = User::factory()->create());


        $response = $this -> post(route('producto.store'),[
            'nombre_producto' => 'Balon Molten',
            'marca' => 'nike',
            'descripcion' => 'Balon de basquetbol marca Molten, version profesional, color café.',
            'precio' => '150',
            'categoria' => 'accesorio',
            'deporte' => 'baloncesto',
            'estado' => 'bueno',
            'tienda' => 'zapopan'
        ]);
        $this->assertDatabaseHas('productos', [
            'nombre_producto' => 'Balon Molten',
        ]);

        $response->assertRedirect(route('producto.index'));
    }

    public function test_validacion_formulario()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('producto.store'), [
            'marca' => 'nike',
            'descripcion' => 'Balon de basquetbol marca Molten, version profesional, color café.',
            'precio' => '150',
            'categoria' => 'accesorio',
            'deporte' => 'baloncesto',
            'estado' => 'bueno',
            'tienda' => 'zapopan'
        ]);

        $response->assertInvalid(['nombre_producto']);
    }

}
