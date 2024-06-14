<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['id_produto', 'quant_produto'];

}
