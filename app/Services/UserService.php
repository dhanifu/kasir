<?php

namespace App\Services;

use App\Repositories\UserRepository;

use Yajra\Datatables\Datatables;

use Auth;

class UserService {

	protected $model;

	public function __construct(UserRepository $user)
	{
		$this->model = $user;
	}

	public function storeData(object $request): Object
	{
		$photo = $this->uploadPhoto($request->photo);

		$data = collect($request->except('photo'));
		$data = $data->merge([
			'photo' => $photo
		]);

		return $this->model->create($data->all());
	}

	public function updateData(int $id, object $request): Object
	{
		$data = collect($request->except('photo'));

		if ($request->hasFile('photo')) {
			$photo = $this->uploadPhoto($request->photo);
			$data = $data->merge([
				'photo' => $photo
			]);
		}

		return $this->model->update($id, $data->all());
	}

	public function deleteData(int $id): Object
	{
		return $this->model->delete($id);
	}

	public function countData(): Int
	{
		return $this->model->count();
	}

	public function uploadPhoto(object $file): String
	{
		$fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$fileName = $fileName.'_'.time().'.'.$file->extension();

		$file->storeAs('public/images', $fileName);

		return $fileName;
	}

	public function updatePassword(string $password): Object
	{
		$user = Auth::user();
		$user->password = $password;
		$user->save();

		return $user;
	}

	public function getDatatables(): Object
	{
		$data = Datatables::of($this->model->get())
					->addIndexColumn()
					->addColumn('photoSrc', function($user) {
						return $user->photoSrc;
					})->addColumn('action', '
						<button class="btn btn-sm btn-success" data-action="edit">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-sm btn-danger" data-action="remove">
							<i class="fa fa-trash"></i>
						</button>
					')->rawColumns(['photoSrc', 'action'])->make();

		return $data;
	}

}