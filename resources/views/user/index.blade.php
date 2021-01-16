@extends('_layouts.app')

@section('title', 'Pengguna')

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
            <h2 class="h6 font-weight-bold mb-0 card-title">Data Pengguna</h2>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal">
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
                            <input type="text" class="form-control" name="name" placeholder="Nama" autofocus>

                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">

                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <select class="form-control custom-select" name="role">
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>

                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <label class="custom-file-label">Upload</label>
                                <input type="file" class="form-control custom-file-input" name="photo">

                                <span class="invalid-feedback"></span>
                            </div>

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

    <style>
        table img{
            width: 100%;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('sufee-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sufee-admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sufee-admin/vendors/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        bsCustomFileInput.init()

        const ajaxUrl = '{{ route('user.datatables') }}'
        const updateUrl = '{{ route('user.update', ':id') }}'
        const deleteUrl = '{{ route('user.destroy', ':id') }}'
        const categoryUrl = '{{ route('category.select') }}'
        const csrf = '{{ csrf_token() }}'
    </script>

    <script src="{{ asset('js/user.js') }}"></script>
@endpush
