<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nome_categoria'];

    public function produtos(): HasMany{
        return $this->hasMany(Produto::class, 'id_categoria');
    }
}
