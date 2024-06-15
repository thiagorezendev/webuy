<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_func';

    protected $fillable = ['nome_func', 'email', 'password'];
}
