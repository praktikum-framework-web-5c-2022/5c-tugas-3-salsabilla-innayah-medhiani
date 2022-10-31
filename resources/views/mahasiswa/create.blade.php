@extends('main')
@section('title', 'Form Tambah Mahasiswa')
@section('content')
<div class="container">
    <div class="row mt-5 py-5">

        <center>
            <h3 class="mb-4">Form Tambah Mahasiswa</h3>
        </center>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="/mahasiswa" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="npm" placeholder="name@example.com" value="{{ old('npm') }}">
                        <label for="floatingInput">NPM</label>
                        @error('npm')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="name@example.com" {{ old('nama') }}>
                        <label for="floatingInput">Nama Lengkap</label>
                        @error('nama')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="jenis_kelamin" aria-label="Floating label select example">
                            <option {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
                            <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>

                        </select>
                        <label for="floatingSelect">Jenis Kelamin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="alamat" placeholder="name@example.com" value="{{ old('alamat') }}">
                        <label for="floatingInput">Alamat</label>
                        @error('alamat')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="ttl" placeholder="name@example.com" value="{{ old('ttl') }}">
                        <label for="floatingInput">Tempat, Tanggal Lahir</label>
                        @error('ttl')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload</label>
                        <input class="form-control" type="file" name="photo" id="formFile">
                        @error('photo')
                        {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

