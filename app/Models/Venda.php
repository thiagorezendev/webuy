<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dates = ['data_venda'];

    protected $fillable = ['id_carrinho', 'pagamento_venda', 'entrega_venda', 'data_venda'];

    public function carrinho() {
        return $this->belongsTo(Carrinho::class, 'id_carrinho');
    }
}
