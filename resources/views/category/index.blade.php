@extends('_layouts.app')

@section('title', 'Kategori')

@section('content')

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h2 class="h6 font-weight-bold mb-0 card-title">Tambah Kategori</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama">

                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div id="alert"></div>
            <div class="card">
                <div class="card-header">
                    <h2 class="h6 font-weight-bold mb-0 card-title">Data Kategori</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama">

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

@endpush

@push('js')

    <script src="{{ asset('sufee-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sufee-admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        const ajaxUrl = '{{ route('category.datatables') }}'
		const updateUrl = '{{ route('category.update', ':id') }}'
		const deleteUrl = '{{ route('category.destroy', ':id') }}'
		const csrf = '{{ csrf_token() }}'

    </script>

    <script src="{{ asset('js/category.js') }}"></script>

@endpush
