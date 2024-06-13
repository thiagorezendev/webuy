<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['id_produto', 'id_fornecedor', 'qntd_compra', 'data_compra', 'preco_uni_compra', 'data_venc'];
}
