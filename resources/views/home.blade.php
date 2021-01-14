@extends('_layouts.app')

@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="float-right">
                    <i class="fa fa-archive"></i>
                </div>
                <h4 class="mb-0">
                    <span class="count">99</span>
                </h4>
                <p class="text-light">Total Barang</p>

            </div>

        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-5">
            <div class="card-body pb-0">
                <div class="float-right">
                    <i class="fa fa-money"></i>
                </div>
                <h4 class="mb-0">
                    <span class="count">99</span>
                </h4>
                <p class="text-light">Total Transaksi</p>

            </div>

        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="float-right">
                    <i class="fa fa-calendar"></i>
                </div>
                <h4 class="mb-0">
                    <span class="count">99</span>
                </h4>
                <p class="text-light">Transaksi Hari Ini</p>

            </div>

        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <div class="float-right">
                    <i class="fa fa-users"></i>
                </div>
                <h4 class="mb-0">
                    <span class="count">99</span>
                </h4>
                <p class="text-light">Total Pengguna</p>

            </div>

        </div>
    </div>

@endsection
