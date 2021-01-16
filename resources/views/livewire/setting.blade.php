<div class="row">
    <div class="col-sm-5 mx-auto">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        <script>
            const navbarbrand = document.getElementById('navbarbrand');
            const navbarbrandhide = document.getElementById('navbarbrandhide');
            @if(session('success'))
                navbarbrand.innerHTML =  '{{ $setting["name"] }}';
                navbarbrandhide.innerHTML = '{{ substr($setting["name"],0,1) }}'
            @endif
        </script>

        <div class="card">
            <form wire:submit.prevent="save">
                @csrf
                    <div class="card-header">
                        <h2 class="h6 mb-0 font-weight-bold card-title">Pengaturan Aplikasi</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="appName" class="form-control @error('setting.name') is-invalid @enderror" 
                            wire:model="setting.name" placeholder="Nama" value="{{ site('name') }}" autofocus>

                        @error('setting.name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea rows="3" class="form-control @error('setting.address') is-invalid @enderror" 
                            wire:model="setting.address" placeholder="Alamat">{{ site('address') }}</textarea>

                        @error('setting.address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
        </div>
    </div>
</div>
