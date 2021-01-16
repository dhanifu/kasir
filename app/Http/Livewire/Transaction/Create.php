<?php

namespace App\Http\Livewire\Transaction;

use App\Services\StuffService;
use App\Transaction;

use Livewire\Component;

class Create extends Component
{

	public $stuff_id;
	public $total;
	public $stuff;

	protected $listeners = [
		'deleteTransaction' => 'delete',
		'clearTransaction' => 'clear'
	];

	public function store(Transaction $transaction)
	{
		$this->validate([
			'stuff_id' => 'required|exists:stuffs,code',
			'total' => 'required|integer|max:'.$this->stuff->stock
		]);

		$stuff = $this->stuff;
		
		$data = [
			'id' => $stuff->id,
			'stuff' => $stuff->name,
			'price' => $stuff->price,
			'stock' => $stuff->stock,
			'total' => (int)$this->total,
		];

		$transaction->create($data);

		$this->emit('transactionAdded');
		$this->emit('updateTotal');
	}

	public function delete(int $id, Transaction $transaction)
	{
		$transaction->delete($id);
		$this->emit('transactionAdded');
		$this->emit('updateTotal');
	}

	public function search(StuffService $stuff)
	{
		$this->validate(
			[ 'stuff_id' => 'required|exists:stuffs,code' ],
			[
				'stuff_id.exists' => 'Barang Tidak Ditemukan'
			]
		);

		$this->stuff = $stuff->getByCode($this->stuff_id);
	}

	public function clear(Transaction $transaction)
	{
		$transaction->clear();
		$this->emit('transactionAdded');
		$this->emit('updateTotal');
	}

    public function render()
    {
        return view('livewire.transaction.create');
    }
}
