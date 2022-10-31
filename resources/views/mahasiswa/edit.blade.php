@extends('main')
@section('title', 'Edit Mahasiswa')
@section('content')
<div class="container">
    <div class="row mt-5 py-5 justify-content-center">
        <div class="col-6">
            <center>
                <h3>Edit Data Mahasiswa</h3>
            </center>
            <form method="post" action="/mahasiswa/{{ $mahasiswa->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="npm" placeholder="name@example.com" value="{{ old('npm') ?? $mahasiswa->npm }}">
                    <label for="floatingInput">NPM</label>
                    @error('npm')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="name@example.com" value="{{ old('nama') ?? $mahasiswa->nama }}">
                    <label for="floatingInput">Nama Lengkap</label>
                    @error('nama')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="jenis_kelamin" aria-label="Floating label select example">
                        <option value="Laki-laki" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    <label for="floatingSelect">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="alamat" placeholder="name@example.com" value="{{ old('alamat') ?? $mahasiswa->alamat }}">
                    <label for="floatingInput">Alamat</label>
                    @error('alamat')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="ttl" placeholder="name@example.com" value="{{ old('ttl') ?? $mahasiswa->ttl }}">
                    <label for="floatingInput">Tempat, Tanggal Lahir</label>
                    @error('ttl')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload</label>
                    <input class="form-control" type="file" name="photo" id="formFile" value="{{ old('photo') ?? $mahasiswa->photo }}">
                    <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="106px" height="110px" alt="{{ $mahasiswa->nama }}" class="mt-2">
                    @error('photo')
                    {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
