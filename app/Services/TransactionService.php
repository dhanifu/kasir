<?php 

namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Transaction;

use Yajra\Datatables\Datatables;

use Auth;

class TransactionService extends Service {

	protected $transaction;
	protected $stuff;

	public function __construct(TransactionRepository $transactionRepo, Transaction $transaction, StuffService $stuff)
	{
		$this->repo = $transactionRepo;
		$this->transaction = $transaction;
		$this->stuff = $stuff;
	}

	public function storeData(array $data): Object
	{
		$data = collect($data);
		$data = $data->merge([
			'invoice' => $this->getInvoice(),
			'user_id' => Auth::id()
		]);

		$transactions = $this->transaction->result();
		
		$transaction = $this->repo->store($data->all(), $transactions);
		
		$this->removeStock($transactions);
		$this->transaction->clear();

		return $transaction;
	}

	public function deleteData(int $id): Object
	{
		return $this->repo->delete($id);
	}

	public function removeStock(array $transactions)
	{
		$transactions = collect($transactions);
		$transactions->each(function ($transaction, $key)
		{
			$this->stuff->removeStock($key, $transaction['total']);
		});
	}

	public function countToday(): Int
	{
		return $this->repo->countToday();
	}

	public function getInvoice(): String
	{
		$id = $this->repo->getLastId();
		$invoice = str_pad($id, 4, '0', STR_PAD_LEFT);
		
		return $invoice;
	}

	public function getByInvoice(string $invoice): Object
	{
		return $this->repo->getByInvoice($invoice);
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->repo->get())
					->addIndexColumn()
					->editColumn('money', function ($transaction)
					{
						return 'Rp '.number_format($transaction->money);
					})
					->addColumn('date', function ($transaction)
					{
						return $transaction->date;
					})
					->addColumn('action', function ($transaction)
					{
						return '
							<a href="'.route('transaction.detail', $transaction->invoice).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
							<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						';
					})
					->make();

		return $datatables;
	}

}
