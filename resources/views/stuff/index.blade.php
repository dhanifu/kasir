@extends('_layouts.app')

@section('title', 'Barang')

@section('content')
	
	@if (session('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div id="alert"></div>
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h2 class="h6 font-weight-bold mb-0 card-title">Data Barang</h2>
			<a href="{{ route('stuff.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Barcode</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control" name="code" placeholder="Kode" autofocus>

                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama">

                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" name="price" placeholder="Harga">

                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control custom-select" name="category_id"></select>

                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
	</div>

@endsection

@push('css')
	
	<link rel="stylesheet" href="{{ asset('sufee-admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('sufee-admin/vendors/select2/css/select2.min.css') }}">

@endpush

@push('js')
	
	<script src="{{ asset('sufee-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('sufee-admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('sufee-admin/vendors/select2/js/select2.min.js') }}"></script>

	<script>
		const ajaxUrl = '{{ route('stuff.datatables') }}'
		const updateUrl = '{{ route('stuff.update', ':id') }}'
		const deleteUrl = '{{ route('stuff.destroy', ':id') }}'
		const categoryUrl = '{{ route('category.select') }}'
		const csrf = '{{ csrf_token() }}'
	</script>

	<script src="{{ asset('js/stuff.js') }}"></script>

@endpush