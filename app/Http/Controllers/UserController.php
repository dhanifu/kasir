<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserService $user)
    {
        $this->middleware('can:isAdmin');
        $this->user = $user;
    }

    public function index(): View
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->user->storeData($request);

        return redirect('user')->with('success', 'Sukses Menambahkan Pengguna');
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $this->user->updateData($id, $request);

        return response()->json(['success' => 'Sukses Mengedit Pengguna']);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->user->deleteData($id);

        return response()->json(['success' => 'Sukses Menghapus Pengguna']);
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->user->updatePassword($request->password);
        return back()->with('success', 'Sukses Mengganti Password');
    }

    public function datatables(): Object
    {
        return $this->user->getDatatables();
    }
}
