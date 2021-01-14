<?php

namespace App\Services;

class Service {

    public $repo;

    public function storeData(array $data): Object
    {
        return $this->repo->create($data);
    }

    public function updateData(int $id, array $data): Object
    {
        return $this->repo->update($id, $data);
    }

    public function deleteData(int $id): Object
    {
        return $this->repo->delete($id);
    }

    public function getOne(int $id): Object
    {
        return $this->repo->find($id);
    }

    public function getData(): Object
    {
        return $this->repo->get();
    }

    public function selectData($name): Object
    {
        return $this->repo->select($name);
    }

    public function countData(): Int
    {
        return $this->repo->count();
    }

}
