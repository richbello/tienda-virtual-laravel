<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'users'; // <- Le dices que use tu tabla 'usuarios'

    protected $fillable = [
        'name', // Ojo que en tu tabla es 'nombre', no 'name'
        'email',
        'password',
    ];
}
