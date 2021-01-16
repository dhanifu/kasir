<?php

namespace App\Repositories;

use App\Models\Stuff;

class StuffRepository extends Repository {

    public function __construct(Stuff $stuff)
    {
        $this->model = $stuff;
    }

    public function find(int $id): Object
    {
        return $this->model->with('category')->findOrFail($id);
    }

    public function addStock(object $stuff, int $stock): Object
    {
        $stuff->increment('stock', $stock);
        return $stuff;
    }

    public function removeStock(object $stuff, int $stock): Object
    {
        $stuff->decrement('stock', $stock);
        return $stuff;
    }

	public function selectByCode($code): Object
	{
		return $this->model->where('code', 'like', '%'.$code.'%')->get(['id', 'code as text', 'name', 'price', 'stock']);
	}

	public function getByCode($code): Object
	{
		return $this->findWhere('code', $code);
	}

	public function getStock(int $id): Int
	{
		return $this->model->findOrFail($id)->value('stock');
	}

	public function get(): Object
	{
		return $this->model->with('category')->latest()->get();
	}

}