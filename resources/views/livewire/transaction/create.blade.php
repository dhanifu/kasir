<div class="row">
	<div class="col-sm-6">
		<div class="card">
		<form wire:submit.prevent="store">
			<div class="card-header">
				<h2 class="card-title h6 mb-0 font-weight-bold">Input Transaksi</h2>
			</div>
			<div class="card-body">
				@if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('error') }}
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
				@endif
				<div class="form-group">
					<label>Kode Barang</label>
					<div class="input-group">
						<input type="text" class="form-control @error('stuff_id') is-invalid @enderror" placeholder="Kode Barang" wire:model="stuff_id">
						<div class="input-group-append">
							<button wire:click="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
						</div>

						@error('stuff_id')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>

				</div>
				<hr>
				<div class="form-group">
					<label>Jumlah</label>
					<input type="number" class="form-control @error('total') is-invalid @enderror" placeholder="Jumlah" wire:model="total">

					@error('total')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary submit" {{ is_null($stuff) ? 'disabled' : '' }}>Tambah</button>
			</div>
		</form>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title h6 mb-0 font-weight-bold">Data Barang</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" name="name" value="{{ $stuff->name ?? 'Nama' }}" disabled>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" class="form-control" name="price" value="{{ isset($stuff->price) ? 'Rp '.number_format($stuff->price) : 'Harga' }}" disabled>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="text" class="form-control" name="stock" value="{{ $stuff->stock ?? 'Stok' }}" placeholder="Stok Barang" disabled>
				</div>
			</div>
		</div>
	</div>
</div>