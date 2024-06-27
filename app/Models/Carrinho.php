<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carrinho extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_carrinho';

    protected $fillable = ['id_cli', 'fechado'];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'id_cli');
    }

    public function produtos(): BelongsToMany {
        return $this->belongsToMany(Produto::class, 'itens_venda', 'id_carrinho', 'id_produto')->withPivot('quantidade_item');
    }

    public function venda() {
        return $this->hasOne(Venda::class, 'id_carrinho');
    }
}
