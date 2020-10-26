<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dadosusuario extends Model
{
    //
    protected $primaryKey = 'iddadosusuarios';

    protected $fillable = [
        'iddadosusuarios', 'nome', 'sobrenome', 'cidade', 'bairro', 'rua',
         'numero', 'complemento', 'telefone', 'datadenascimento', 'cpf',
    ];

}
