<?php

namespace App\Http\Controllers;

use App\Services\StockService;
use App\Http\Requests\Stock\CreateStockRequest;

use Illuminate\Http\JsonResponse;

class StockController extends Controller
{

	protected $stock;

	public function __construct(StockService $stock)
	{
		$this->stock = $stock;
    }
    
	public function datatables(): Object
	{
		return $this->stock->getDatatables();
	}

	public function store(CreateStockRequest $request): JsonResponse
	{
		$this->stock->storeData($request->all());

		return response()->json(['success' => 'Sukses Mengedit Stok']);
	}

	public function destroy(int $id): JsonResponse
	{
		$this->stock->deleteData($id);

		return response()->json(['success' => 'Sukses Menghapus Stok']);
	}
}
