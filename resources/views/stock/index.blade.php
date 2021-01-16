@extends('_layouts.app')

@section('title', 'Stok')

@section('content')
	
	<div class="row">
		<div class="col-sm-4">
			<div class="card">
			<form action="{{ route('stock.store') }}" method="post">
				@method('PATCH')
				<div class="card-header">
					<h2 class="h6 font-weight-bold mb-0 card-title">Stok</h2>
				</div>
				<div class="card-body">
					@csrf
					<div class="form-group">
						<label>Barang</label>
						<select name="stuff_id" class="form-control custom-select"></select>

						<span class="invalid-feedback"></span>
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="number" class="form-control" name="total" placeholder="Total">

						<span class="invalid-feedback"></span>
					</div>
					<div class="form-group">
						<label>Tipe</label>
						<select name="type" class="form-control custom-select">
							<option value="masuk">Masuk</option>
							<option value="keluar">Keluar</option>
						</select>

						<span class="invalid-feedback"></span>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
			</div>
		</div>
		<div class="col-sm-8">
			<div id="alert"></div>
			<div class="card">
				<div class="card-header">
					<h2 class="h6 card-title font-weight-bold mb-0">Riwayat Aktivitas
						<div class="float-right">
							<a href="javascript:void(0)" id="reloadTable" class="btn btn-success btn-sm mr-2">Reload</a>
						</div>
					</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Barang</th>
									<th>Type</th>
									<th>Total</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
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
		const ajaxUrl = '{{ route('stock.datatables') }}'
		const deleteUrl = '{{ route('stock.destroy', ':id') }}'
		const stuffUrl = '{{ route('stuff.select') }}'
		const csrf = '{{ csrf_token() }}'
		const reloadTable = document.getElementById('reloadTable')
	</script>

	<script src="{{ asset('js/stock.js') }}"></script>

@endpush