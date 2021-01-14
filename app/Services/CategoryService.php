<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

use Yajra\Datatables\Datatables;

class CategoryService extends Service {

    public function __construct(CategoryRepository $category)
    {
        $this->repo = $category;
    }

    public function getDatatables(): Object
    {
		$datatables = Datatables::of($this->getData())
						->addIndexColumn()->addColumn('action', '
                            <button class="btn btn-success btn-sm" data-action="edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-action="remove">
                                <i class="fa fa-trash"></i>
                            </button>
						')->make();
		return $datatables;
	}

}