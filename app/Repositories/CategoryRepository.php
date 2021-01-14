<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository {

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}