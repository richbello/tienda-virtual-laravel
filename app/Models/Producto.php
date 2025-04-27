<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Definir los atributos que pueden ser asignados en masa
    protected $fillable = ['nombre', 'precio'];
}
