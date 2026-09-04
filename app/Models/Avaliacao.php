<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    // Define explicitamente o nome da tabela no banco de dados
    protected $table = 'avaliacaos';

    // Lista os campos da tabela que podem ser preenchidos em massa (via Form/Request)
    protected $fillable = ['livro','autor','data','avaliacao'];
}