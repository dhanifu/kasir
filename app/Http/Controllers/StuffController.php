<?php

namespace App\Http\Controllers;

use App\Services\StuffService;
use App\Http\Requests\Stuff\CreateStuffRequest;
use App\Http\Requests\Stuff\UpdateStuffRequest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class StuffController extends Controller
{
    protected $stuff;

    public function __construct(StuffService $stuff)
    {
        $this->stuff = $stuff;
    }

    public function index(): View
    {
        return view('stuff.index');
    }

    public function datatables(): Object 
    {
        return $this->stuff->getDatatables();
    }

    public function create(): View
    {
        return view('stuff.create');
    }

    public function select(Request $request): Object 
    {
        return $this->stuff->selectData($request->name);
    }
    public function selectCode(Request $request): Object
    {
        return $this->stuff->selectByCode($request->code);
    }

    public function store(CreateStuffRequest $request): RedirectResponse
    {
        $this->storeData($request->all());
        return redirect('stuff')->with('success', 'Sukse Menambah Barang');
    }

    public function show(int $id): View 
    {
        $stuff = $this->stuff->getOne($id);
        return view('stuff.show', compact('stuff'));
    }

    public function update(UpdateStuffRequest $request, int $id): JsonResponse
    {
        $this->stuff->updateData($id, $request->all());
        return response()->json(['success'=>'Sukses Mengedit Barang']);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->stuff->deleteData($id);
        return response()->json(['success'=>'Sukses Menghapus Barang']);
    }
}
