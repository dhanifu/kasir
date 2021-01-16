<div class="col-sm-4">
	<div class="card">
	<form wire:submit.prevent="store">
		<div class="card-header">
			<h2 class="card-title h6 mb-0 font-weight-bold">Input Transaksi</h2>
		</div>
		<div class="card-body">
			<div class="form-group">
				<label>Subtotal</label>
				<div class="input-group">
					<input type="text" class="form-control" value="Rp {{ number_format($total) }}" disabled>
				</div>
			</div>
			<div class="form-group">
				<label>Bayar</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Rp</span>
					</div>
					<input type="text" name="money" class="form-control @error('money') is-invalid @enderror" wire:model="money" placeholder="Bayar">
					@error('money')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<label>Kembali</label>
				<div class="input-group">
					<input type="text" class="form-control" value="Rp {{ number_format($return) }}" disabled>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary" type="submit" {{ $total < 1 ? 'disabled' : '' }}>Bayar</button>
		</div>
	</form>
	</div>
</div>