<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Laravel\Scout\Searchable;

class Pedido extends Model
{
    //

    //use Searchable;

    protected $primaryKey = 'idpedidos';

    /*public function toSearchableArray()
    {
        $array = $this->toArray();

        $array =  [
            'idpedidos' => $this->idpedidos
        ];

        return $array;
    }*/
}
