<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFactory extends Factory
{
    public function definition(): array
    {
        {
        $livros=['Os tres porquinhos', 'Orgulho e Preconceito','Turma da Monica Jovem','A Morte no Nilo','Admirável Mundo Novo','O Principe Cruel'];
        }
         return [
            'livro' => fake()->randomElement($livros),
            'autor' => fake()->name(),
            'data' => fake()->date(),
            'avaliacao' => $this->faker->text(200),           
        ];
    }

}
    
