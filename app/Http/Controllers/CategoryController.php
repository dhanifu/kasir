<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Requests\Category\CreateCategoryRequest;
use App\Requests\Category\UpdateCategoryRequest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('category.index');
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $this->category->storeData($request->all());
        return response()->json(['success' => 'Sukses Menambahkan Kategori']);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $this->category->updateData($id, $request->all());
        return response()->json(['success' => 'Sukses Mengedit Kategori']);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->category->deleteData($id);
        return response()->json(['success' => 'Sukses Menghapus Kategori']);
    }

    public function datatables(): Object
    {
        return $this->category->getDatatables();
    }
}
