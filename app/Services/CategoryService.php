<?php

namespace App\Services;

use App\Services\CategoryService;

use Yajra\Datatables\Datatables;

class CategoryService extends Service {

    public function __construct(CategoryService $category)
    {
        $this->repo = $category;
    }

    public function getDatatables(): Object
    {
        $datables = Datatables::of($this->getData())
                    ->addIndexColumn()->addColumn('action', '
                        <button class="btn btn-warning btn-sm" data-action="edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" data-action="remove">
                            <i class="fa fa-trash"></i>
                        </button>
                    ')->make();
        return $datables;
    }

}