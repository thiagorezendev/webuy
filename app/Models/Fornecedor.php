<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nome_fornecedor', 'email_fornecedor'];
}
