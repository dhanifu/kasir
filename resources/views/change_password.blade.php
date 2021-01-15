@extends('_layouts.app')

@section('title', 'Ganti Password')

@section('content')
	
	<div class="row">
		<div class="col-sm-5 mx-auto">

			@if (session('success'))
				<div class="alert alert-success alert-dismissible">
					{{ session('success') }}
					<button class="close" data-dismiss="alert">&times;</button>
				</div>
			@endif
			
			<div class="card">
			<form action="{{ route('change_password') }}" method="post">
				@method('PATCH')
				@csrf
				<div class="card-header">
					<h2 class="h6 mb-0 font-weight-bold card-title">Ganti Password</h2>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Baru" autofocus>

						@error('password')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</div>
		</div>
	</div>

@endsection