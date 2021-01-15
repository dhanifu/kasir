<?php 

namespace App\Services;

use App\Services\StuffService;
use App\Repositories\StockRepository;

use Yajra\Datatables\Datatables;

class StockService extends Service {

	protected $stuff;

	public function __construct(StockRepository $stock, StuffService $stuff)
	{
		$this->repo = $stock;
		$this->stuff = $stuff;
	}

	public function storeData(array $data): Object
	{
		if ($data['type'] === 'masuk') {
			$this->stuff->addStock($data['stuff_id'], $data['total']);
		} else {
			$this->stuff->removeStock($data['stuff_id'], $data['total']);
		}

		return $this->repo->create($data);
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->getData())
						->addIndexColumn()
						->addColumn('date', function ($stock)
						{
							return localDate($stock->created_at);
						})
						->addColumn('action', '
							<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						')
						->rawColumns(['type', 'action'])
						->make();

		return $datatables;
	}

}
