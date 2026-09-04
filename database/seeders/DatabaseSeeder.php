<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        //this call apagado para não duplicar dados
        $categorias = \App\Models\CategoriaLivro::factory(6)->create();


        \App\Models\Usuario::factory(10)->create();
        \App\Models\Avaliacao::factory(10)->create();
        \App\Models\Livraria::factory(15)->create([
        'categoria_id' => fn () => $categorias->random()->id,
    ]);  //função usada para não criar uma cateogoria para cada livro 
    }
}
