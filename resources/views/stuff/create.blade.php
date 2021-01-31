@extends('_layouts.app')

@section('title', 'Tambah Barang')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-sm-6">
			<div class="card">
			<form action="{{ route('stuff.store') }}" method="post">
				@csrf
				<div class="card-header">
					<h2 class="h6 font-weight-bold mb-0 card-title">Tambah Barang</h2>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Kode" value="{{ old('code') }}" autofocus>

						@error('code')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}">

						@error('name')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label>Harga</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp</span>
							</div>
							<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Harga" value="{{ old('price') }}">

							@error('price')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id"></select>

						@error('category_id')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Tambah</button>
					<a class="btn btn-secondary" href="{{ route('category.index') }}">Kembali</a>
				</div>
			</form>
			</div>
		</div>
	</div>

@endsection

@push('css')
	
	<link rel="stylesheet" href="{{ asset('sufee-admin/vendors/select2/css/select2.min.css') }}">

@endpush

@push('js')
	
	<script src="{{ asset('sufee-admin/vendors/select2/js/select2.min.js') }}"></script>

	<script>
		jQuery(function ($) {
			$('[name=price]').on('keyup', function() {
				const number = Number(this.value.replace(/\D/g, ''))
				const price = new Intl.NumberFormat().format(number)
				
				this.value = price.split('.').join(',')
			})
			$('select').select2({
				placeholder: 'Kategori',
				ajax: {
					url: '{{ route('category.select') }}',
					type: 'post',
					data: params => ({
						name: params.term,
						_token: '{{ csrf_token() }}'
					}),
					processResults: res => ({
						results: res
					}),
					cache: true
				}
			})
		})
	</script>

@endpush
