<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['cpf_cli', 'cep', 'numero', 'complemento'];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cpf_cli');
    }


    
}
