<?php

namespace App\Http\Livewire\Transaction;

use App\Transaction;
use App\Services\TransactionService;

use Livewire\Component;

class Payment extends Component
{

	public $total;
	public $money;
	public $return;

	protected $listeners = ['updateTotal' => 'get'];

	public function __construct()
	{
		$this->get();
	}

	public function store(TransactionService $transactionService)
	{
		$this->money = intval(str_replace(',', '', $this->money));

		$data = $this->validate([
			'money' => 'required|integer|min:'.$this->total
		]);

		$transaction = $transactionService->storeData($data);

		return redirect()->route('transaction.detail', $transaction->invoice);
	}

	public function get()
	{
		$transaction = new Transaction;
		$this->total = $transaction->total();
	}

	public function updatedMoney($money)
	{
		$duit = str_replace(',','',$money);
		$this->return = max(intval($duit) - $this->total, 0);
	}

    public function render(Transaction $transaction)
    {
        return view('livewire.transaction.payment');
    }
}
