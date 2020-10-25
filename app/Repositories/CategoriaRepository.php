<?php

namespace App\Repositories;

use App\Categoria;

class CategoriaRepository 
{
	private $model;

	public function __construct(Categoria $model)
	{
		$this->model = $model;
	}

	public function findAll()
	{
		return $this->model->all();
	}    
}