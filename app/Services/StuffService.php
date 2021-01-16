<?php

namespace App\Services;

use App\Repositories\StuffRepository;

use Yajra\Datatables\Datatables;

class StuffService extends Service {

    public function __construct(StuffRepository $stuff)
    {
        $this->repo = $stuff;
    }

	public function addStock(int $id, int $stock): Object
	{
		$stuff = $this->repo->find($id);
		$this->repo->addStock($stuff, $stock);

		return $stuff;
	}

	public function removeStock(int $id, int $stock): Object
	{
		$stuff = $this->repo->find($id);
		$this->repo->removeStock($stuff, $stock);

		return $stuff;
	}

	public function getByCode($code): Object
	{
		return $this->repo->getByCode($code);
	}

	public function selectByCode($code): Object
	{
		return $this->repo->selectByCode($code);
	}

	public function getStock(int $id): Int
	{
		return $this->repo->getStock($id);
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->getData())
						->addIndexColumn()
						->editColumn('price', function ($stuff)
						{
							return 'Rp '.number_format($stuff->price);
						})
						->addColumn('barcode', function ($stuff)
						{
							return $stuff->barcodeImage;
						})
						->addColumn('action', function ($stuff)
						{
							return '
								<button class="btn btn-success btn-sm" data-action="edit"><i class="fa fa-edit"></i></button>
								<a class="btn btn-info btn-sm" href="'.route('stuff.show', $stuff->id).'"><i class="fa fa-eye"></i></a>
								<button class="btn btn-danger btn-sm" data-action="remove"><i class="fa fa-trash"></i></button>
							';
						})
						->rawColumns(['barcode', 'action'])
						->make();

		return $datatables;
	}

}