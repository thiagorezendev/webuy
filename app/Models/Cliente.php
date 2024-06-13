<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['cpf_cli', 'nome_cli', 'email_cli', 'tel_cli', 'senha_cli', 'data_nasc_cli'];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'cpf_cli');
    }

}
