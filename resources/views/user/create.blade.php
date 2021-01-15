@extends('_layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h2 class="h6 font-weight-bold mb-0 card-title">Tambah Pengguna</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nama" value="{{ old('name') }}" autofocus>

                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" value="{{ old('password') }}">

                                    @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <select class="form-control custom-select @error('role') is-invalid @enderror" name="role">
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>

                            @error('role')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <label class="custom-file-label">Upload</label>
                                <input type="file"
                                    class="form-control custom-file-input @error('photo') is-invalid @enderror" name="photo"
                                    value="{{ old('photo') }}">

                                @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                        <a class="btn btn-secondary" href="{{ route('user.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('sufee-admin/vendors/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        bsCustomFileInput.init()
    </script>
@endpush
