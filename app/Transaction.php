<?php 

namespace App;

use Illuminate\Support\Facades\Cookie;

class Transaction {

	public $transactions;

	public function __construct()
	{
		$transactions = Cookie::get('transactions');

		$this->transactions = $transactions ? json_decode($transactions) : [];
	}

	public function create(array $data)
	{
		$transactions = collect($this->transactions);
		$transaction = $transactions->firstWhere('id', $data['id']);

		if ($transaction) {
			$transaction = $this->update($transaction, $data);
		} else {
			$transactions->push($data);
		}

		$this->store($transactions);

	}

	public function update(object $transaction, array $data)
	{
		$total = $transaction->total + $data['total'];
		
		if ($total > $data['stock']) {
			session()->flash('error', 'Jumlah Terlalu banyak');
			return false;
		} else {
			$transaction->total = $total;
		}

		return $transaction;
	}

	public function delete(int $id)
	{
		$transactions = collect($this->transactions);
		$transactions->splice($id, 1);

		$this->store($transactions);
	}

	public function clear()
	{
		Cookie::queue(Cookie::forget('transactions'));
	}

	public function store(object $transactions)
	{
		Cookie::queue(Cookie::make('transactions', json_encode($transactions), 2800));
	}

	public function total(): Int
	{
		$transactions = collect($this->transactions);

		$total = $transactions->sum(function ($transaction)
		{
			return $transaction->total * $transaction->price;
		});

		return $total;
	}

	public function result(): Array
	{
		$transactions = collect($this->transactions);
		
		$id = $transactions->pluck('id');
		$data = $transactions->map(function ($transaction)
		{
			return ['total' => $transaction->total];
		});

		$data = $id->combine($data);

		return $data->all();
	}

	public function get(): Array
	{
		return $this->transactions;
	}

}
