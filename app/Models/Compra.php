<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Compra extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $primaryKey = 'id_compra';

    protected $fillable = ['id_produto', 'id_fornecedor', 'qntd_compra', 'data_compra', 'preco_uni_compra', 'data_venc'];

    public function produto(): BelongsTo {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function fornecedor(): BelongsTo {
        return $this->belongsTo(Fornecedor::class, 'id_fornecedor');
    }

}
