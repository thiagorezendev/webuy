<?php

namespace App\Models;

use App\Models\Carrinho;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $primaryKey = 'id_produto';

    protected $fillable = ['id_categoria', 'nome_produto', 'desc_produto', 'foto_produto', 'preco_produto'];

    public function estoque(): HasOne {
        return $this->hasOne(Estoque::class, 'id_produto');
    }

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function carrinhos(): BelongsToMany {
        return $this->belongsToMany(Carrinho::class, 'itens_venda', 'id_carrinho', 'id_produto');
    }
}
