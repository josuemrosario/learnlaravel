<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //criado na aula 119 factories
            'nome' => fake()->name(),
            'telefone' => fake()->cellphoneNumber(),
            'email' => fake()->email(),
            'motivo_contato_id' => fake()->numberBetween(1,3),
            'mensagem' => fake()->sentence(4)
        ];
    }
}
