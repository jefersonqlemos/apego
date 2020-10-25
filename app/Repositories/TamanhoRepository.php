<?php

namespace App\Repositories;

use App\Tamanho;

class TamanhoRepository 
{
	private $model;

	public function __construct(Tamanho $model)
	{
		$this->model = $model;
	}

	public function findAll()
	{
		return $this->model->all();
	}    
}