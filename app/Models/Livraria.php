<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraria extends Model
{
    use HasFactory;

    // Define qual é o nome exato da tabela no banco de dados
    protected $table = 'livraria';

    // Libera esses campos para serem cadastrados ou alterados direto pelos formulários
    protected $fillable = ['nome','valor','autor','genero'];
}