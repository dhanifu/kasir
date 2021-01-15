<?php

namespace App\Services;

use App\Repositories\UserRepository;

use Yajra\Datatables\Datatables;

class UserService {

	public $model;

	public function __construct(UserRepository $user)
	{
		$this->model = $user;
	}

	public function storeData(object $data): Object
	{
		$photo = $this->uploadPhoto($data->file);
		$data->merge([
			'photo' => $photo
		]);
	}

	public function updateData(int $id, object $data): Object
	{
		if ($data->hasFile('file')) {
			$photo = $this->uploadPhoto($data->file);
			$data->merge([
				'photo' => $photo
			]);
		}

		return $this->model->update($id, $data->all());
	}

	public function deleteData(int $id): Object
	{
		return $this->model->delete($id);
	}

	public function uploadPhoto(object $file): String
	{
		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$filename = $filename . '_' . time() . '.' . $filename->extension();

		$file->storeAs('public/image', $filename);

		return $filename;
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