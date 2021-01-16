<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
	protected $transaction;

	public function __construct(TransactionService $transaction)
	{
		$this->transaction = $transaction;
	}

	public function detail(string $invoice): View
	{
		$transaction = $this->transaction->getByInvoice($invoice);

		return view('transaction.detail', compact('transaction'));
	}

	public function print(string $invoice): View
	{
		$transaction = $this->transaction->getByInvoice($invoice);

		return view('transaction.print', compact('transaction'));
	}

	public function destroy(int $id): JsonResponse
	{
		$this->transaction->deleteData($id);

		return response()->json(['success' => 'Sukses Menghapus Transaksi']);
	}

	public function datatables(): Object
	{
		return $this->transaction->getDatatables();
	}
}
