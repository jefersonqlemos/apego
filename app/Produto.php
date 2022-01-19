<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Produto extends Model
{

    use Searchable;

    protected $primaryKey = 'idprodutos';

    //

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array =  [
            'nome' => $this->nome,
            'variante_tamanho' => $this->variante_tamanho,
        ];

        return $array;
    }

}
