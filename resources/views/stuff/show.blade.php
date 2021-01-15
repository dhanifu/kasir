@extends('_layouts.app')

@section('title', $stuff->name)

@section('content')
	
	<div class="row">
		<div class="col-sm-6 mx-auto">
			<div class="card">
				<div class="card-header">
					<h2 class="h6 font-weight-bold mb-0 card-title">Detail Barang</h2>
				</div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-6">Barcode</dt>
						<dd class="col-sm-6">{!! $stuff->barcodeImage !!}</dd>
						<dt class="col-sm-6">Kode</dt>
						<dd class="col-sm-6">{{ $stuff->code }}</dd>
						<dt class="col-sm-6">Nama</dt>
						<dd class="col-sm-6">{{ $stuff->name }}</dd>
						<dt class="col-sm-6">Kategori</dt>
						<dd class="col-sm-6">{{ $stuff->category->name }}</dd>
						<dt class="col-sm-6">Harga</dt>
						<dd class="col-sm-6">{{ $stuff->price }}</dd>
						<dt class="col-sm-6">Stok</dt>
						<dd class="col-sm-6">{{ $stuff->stock }}</dd>
						<dt class="col-sm-6">Tanggal Masuk</dt>
						<dd class="col-sm-6">{{ localDate($stuff->created_at) }}</dd>
					</dl>
				</div>
				<div class="card-footer">
					<a href="{{ route('stuff.index') }}" class="btn btn-secondary">Kembali</a>
				</div>
			</div>
		</div>
	</div>

@endsection