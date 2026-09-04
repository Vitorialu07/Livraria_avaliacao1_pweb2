<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLivro extends Model
{
   use HasFactory;

   // Define quais campos podem ser preenchidos diretamente pelos formulários no banco
   protected $fillable = [
    'nome',
    'autor',
    'valor',
    'genero',
    'categoria.id',
   ];

   // Converte automaticamente o tipo do dado do banco (no caso, força o ID a ser inteiro)
   protected $cast= [
    'categoria.id'=> 'integer',
   ];

   // Cria a relação de pertencimento (uma categoria pai ou vinculada a ela mesma)
   public function categoria(){
        return $this->belongsTo(CategoriaLivro::class, 'categoria.id');
   }

}