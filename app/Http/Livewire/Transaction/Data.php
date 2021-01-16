<?php

namespace App\Http\Livewire\Transaction;

use App\Transaction;

use Livewire\Component;

class Data extends Component
{

	public $transactions;
	public $total;

	protected $listeners = ['transactionAdded' => 'get'];

	public function __construct()
	{
		$this->get();
	}

	public function get()
	{
		$transaction = new Transaction;

		$this->transactions = $transaction->get();
		$this->total = $transaction->total();
	}

    public function render()
    {
    	$transactions = $this->transactions;
        return view('livewire.transaction.data', compact('transactions'));
    }
}
