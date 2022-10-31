@extends('main')
@section('title', 'Edit Mata Kuliah')
@section('content')
<div class="container">
    <div class="row mt-5 py-5 justify-content-center">
        <div class="col-6">
            <center>
                <h3>Edit Data Mata Kuliah</h3>
            </center>
            <form method="post" action="/matkul/{{ $matkul->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="kode_matkul" placeholder="name@example.com" value="{{ old('kode_matkul') ?? $matkul->kode_matkul }}">
                    <label for="floatingInput">Kode Matkul</label>
                    @error('kode_matkul')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="nama_matkul" placeholder="name@example.com" value="{{ old('nama_matkul') ?? $matkul->nama_matkul }}">
                    <label for="floatingInput">Nama Matkul</label>
                    @error('nama_matkul')
                    {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

