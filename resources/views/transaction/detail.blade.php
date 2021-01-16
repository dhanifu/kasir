@extends('_layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-9">
					<h1 class="h3">{{ site('name') }}</h1>
					<p>{{ site('address') }}</p>
				</div>
				<div class="col-sm-3">
					<dl class="row mx-0">
						<dt class="col-sm-5 px-0">Tanggal</dt>
						<dd class="col-sm-7 row px-0 mx-0 text-right">
							<span class="col-sm-2 px-0">:</span>
							<span class="col-sm-10 px-0">{{ localDate($transaction->created_at) }}</span>
						</dd>
						<dt class="col-sm-5 px-0">Nota</dt>
						<dd class="col-sm-7 row px-0 mx-0 text-right">
							<span class="col-sm-2 px-0">:</span>
							<span class="col-sm-10 px-0">#{{ $transaction->invoice }}</span>
						</dd>
						<dt class="col-sm-5 px-0">Kasir</dt>
						<dd class="col-sm-7 row px-0 mx-0 text-right">
							<span class="col-sm-2 px-0">:</span>
							<span class="col-sm-10 px-0">{{ $transaction->user->name }}</span>
						</dd>
					</dl>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@php
							$total = 0;
						@endphp
						@foreach($transaction->stuffs as $stuff)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $stuff->name }}</td>
								<td>Rp {{ number_format($stuff->price) }}</td>
								<td>{{ $stuff->pivot->total }}</td>
								<td>Rp {{ number_format($stuff->price * $stuff->pivot->total) }}</td>
								@php
									$total += $stuff->price * $stuff->pivot->total;
								@endphp
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4" align="right"><strong>Subtotal</strong></td>
							<td>Rp {{ number_format($total) }}</td>
						</tr>
						<tr>
							<td colspan="4" align="right"><strong>Uang</strong></td>
							<td>Rp {{ number_format($transaction->money) }}</td>
						</tr>
						<tr>
							<td colspan="4" align="right"><strong>Kembali</strong></td>
							<td>Rp {{ number_format($transaction->money - $total) }}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="card-footer">
			<a href="{{ route('transaction.print', $transaction->invoice) }}" class="btn btn-primary">Print</a>
			<a href="{{ route('report') }}" class="btn btn-secondary">Kembali</a>
		</div>
	</div>
@endsection