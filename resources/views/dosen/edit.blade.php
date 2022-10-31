@extends('main')
@section('title', 'Edit Dosen')
@section('content')
<div class="container">
    <div class="row mt-5 py-5 justify-content-center">
        <div class="col-6">
            <center>
                <h3>Edit Data Dosen</h3>
            </center>
            <form method="post" action="/dosen/{{ $dosen->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="nidn" placeholder="name@example.com" value="{{ old('nidn') ?? $dosen->nidn }}">
                    <label for="floatingInput">NIDN</label>
                    @error('nidn')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="name@example.com" value="{{ old('nama') ?? $dosen->nama }}">
                    <label for="floatingInput">Nama Lengkap</label>
                    @error('nama')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="jenis_kelamin" aria-label="Floating label select example">
                        <option value="Laki-laki" {{ old('jenis_kelamin') ?? $dosen->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') ?? $dosen->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    <label for="floatingSelect">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="alamat" placeholder="name@example.com" value="{{ old('alamat') ?? $dosen->alamat }}">
                    <label for="floatingInput">Alamat</label>
                    @error('alamat')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="ttl" placeholder="name@example.com" value="{{ old('ttl') ?? $dosen->ttl }}">
                    <label for="floatingInput">Tempat, Tanggal Lahir</label>
                    @error('ttl')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload</label>
                    <input class="form-control" type="file" name="photo" id="formFile" value="{{ old('photo') ?? $dosen->photo }}">
                    <img src="{{ asset('storage/'.$dosen->photo) }}" width="106px" height="110px" alt="{{ $dosen->nama }}" class="mt-2">
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
