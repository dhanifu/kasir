<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepositroy extends Repository {

    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }

    public function store(Array $data, Array $stuff): Object
    {
        $transaction = $this->model->create($data);
        $transaction->stuff()->attach($stuff);

        return $transaction;
    }

    public function countToday(): Int
    {
        $count = $this->model->whereDate('created_at',today())->count();

        return $count;
    }

    public function getByInvoice(string $invoice): Object
    {
        return $this->model->whereInvoice($invoice)->with(['stuffs', 'user'])->firstOrFail();
    }

    public function getLastId(): Int 
    {
        $id = $this->model->latest()->value('id') ?? 0;
        return $id + 1;
    }

    public function get(): Object
    {
        return $this->model->with('user')->latest()->get();
    }

}