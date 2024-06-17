<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estoque extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['id_produto', 'quant_produto'];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

}
