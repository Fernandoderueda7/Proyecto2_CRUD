<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_producto' => $this->faker->name(),
            'marca' => $this->faker->randomElement(['nike', 'adidas', 'puma', 'newbalance', 'umbro', 'charly', 'otra']),
            'descripcion' => $this->faker->sentence(),
            'precio' => $this->faker->randomNumber(5, true),
            'categoria' => $this->faker->randomElement(['ropa', 'calzado', 'accesorio']),
            'deporte' => $this->faker->randomElement(['futbol', 'baloncesto', 'voleibol', 'beisbol', 'box', 'otro']),
            'estado' => $this->faker->randomElement(['excelente', 'bueno', 'Regular']),
            'tienda' => $this->faker->randomElement(['gdl', 'zapopan', 'tlaquepaque']),
        ];
    }
}