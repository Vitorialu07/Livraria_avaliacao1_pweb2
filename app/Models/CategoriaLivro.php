<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLivro extends Model
{
   use HasFactory;
   protected $fillable = [
    'nome',
    'autor',
    'valor',
    'genero',
    'categoria.id',
   ];

   protected $cast= [
    'categoria.id'=> 'integer',
   ];

   public function categoria(){
        return $this->belongsTo(CategoriaLivro::class, 'categoria.id');
   }

}
