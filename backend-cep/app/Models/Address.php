<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['cep', 'logradouro', 'bairro', 'localidade', 'uf', 'complemento', 'numero_casa'];
}
