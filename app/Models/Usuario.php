<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraria extends Model
    
{
    use HasFactory;
    protected $table = 'usuario';
    protected $fillable = ['nome','cpf','endereco','email','numero'];
}
