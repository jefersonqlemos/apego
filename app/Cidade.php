<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Cidade extends Model
{
    //

    use Searchable;

    protected $primaryKey = 'idcidades';

    //

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array =  [
            'cidade' => $this->cidade,
        ];

        return $array;
    }
}
