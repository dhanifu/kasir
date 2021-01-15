<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository extends Repository {

    public function __construct(Stock $stock)
    {
        $this->model = $stock;
    }

    public function get(): Object
	{
		return $this->model->with('stuff')->latest()->get();
	}

}