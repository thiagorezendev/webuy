<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    public $timestamps = false;

    protected $primaryKey = 'id_fornecedor';
    protected $fillable = ['nome_fornecedor', 'email_fornecedor'];
}
