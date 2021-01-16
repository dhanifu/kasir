<?php

namespace App\Repositories;

class Repository {

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $data): Object
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Object
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): Object
    {
        $this->model->destroy($id);
        return $this->model;
    }

    public function select($name): Object
	{
		return $this->model->where('name', 'like', '%'.$name.'%')->get(['id', 'name as text']);
	}

	public function where(string $columns, $value): Object
	{
		return $this->where($columns, $value)->get();
	}

	public function find(int $id): Object
	{
		return $this->model->findOrFail($id);
	}

	public function findWhere(string $columns, $value): Object
	{
		return $this->model->where($columns, $value)->firstOrFail();
	}

	public function get(): Object
	{
		return $this->model->latest()->get();
	}

	public function count(): int
	{
		return $this->model->count();
	}

}