<?php

namespace Tests\Feature;

use App\Models\Producto;
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
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());


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

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

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
    
    public function test_eliminar_producto(): void
    {
        // Crear un usuario para actuar en la prueba
        $user = User::factory()->create();
    
        $this->actingAs($user);
    
        // Crear un nuevo producto para eliminarlo posteriormente
        $producto = Producto::create([
            'nombre_producto' => 'Balon Nike',
            'marca' => 'nike',
            'descripcion' => 'Balon de futbol marca Nike, tamaño 5, color blanco.',
            'precio' => '50',
            'categoria' => 'accesorio',
            'deporte' => 'futbol',
            'estado' => 'bueno',
            'tienda' => 'zapopan',
            'user_id' => $user->id, // Asignar el ID del usuario al producto
        ]);
    
        // Asegurar que el producto se ha creado correctamente
        $this->assertDatabaseHas('productos', [
            'nombre_producto' => 'Balon Nike',
        ]);
    
        // Seleccionar el producto que acabamos de crear
        $productoSeleccionado = Producto::find($producto->id);
    
        // Enviar una petición DELETE para eliminar el producto seleccionado
        $response = $this->delete(route('producto.destroy', $productoSeleccionado->id));

        // Asegurar que el producto ya no existe en la base de datos
        $this->assertSoftDeleted('productos', [
            'id' => $productoSeleccionado->id,
        ]);
        
        // Asegurar que se redirige correctamente después de eliminar el producto
        $response->assertRedirect(route('producto.index'));
    
    }
}
