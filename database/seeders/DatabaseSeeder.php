<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            CategoriaLivroSeeder::class,
            LivrariaSeeder::class,
            AvaliacaoSeeder::class,

        ]);
        
        \App\Models\Livraria::factory(10)->create();
        \App\Models\Usuario::factory(10)->create();
        \App\Models\Avaliacao::factory(10)->create();
        \App\Models\CategoriaLivro::factory(6)->create();
    }
}
