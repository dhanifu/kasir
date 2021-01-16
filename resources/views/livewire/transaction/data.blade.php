<div class="col-sm-8">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center py-2">
			<h2 class="card-title h6 mb-0 font-weight-bold">Data Transaksi</h2>
			<button class="btn btn-danger btn-sm" wire:click="$emit('clearTransaction')">Reset</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th>Barang</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($transactions as $transaction)
						<tr>
							<td>{{ $transaction->stuff }}</td>
							<td>Rp {{ number_format($transaction->price) }}</td>
							<td>{{ $transaction->total }}</td>
							<td align="right">Rp {{ number_format($transaction->total * $transaction->price) }}</td>
							<td><button class="btn btn-sm btn-danger" wire:click="$emit('deleteTransaction', {{ $loop->index }})"><i class="fa fa-trash"></i></button></td>
						</tr>
					@empty
						<tr>
							<td colspan="5" align="center">Kosong</td>
						</tr>
					@endforelse
					</tbody>
					@if ($transactions)
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Subtotal</strong></td>
								<td align="right">Rp {{ number_format($total) }}</td>
								<td></td>
							</tr>
						</tfoot>
					@endif
				</table>
			</div>
		</div>
	</div>
</div>