<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nome_func', 'email_func', 'senha_func'];
}
