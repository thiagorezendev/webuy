<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['cpf_cli', 'nome_cli', 'email', 'tel_cli', 'password', 'data_nasc_cli'];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'id_cli');
    }

}
