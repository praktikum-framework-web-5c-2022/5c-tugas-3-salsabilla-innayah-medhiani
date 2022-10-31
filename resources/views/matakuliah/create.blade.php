@extends('main')
@section('title', 'Form Tambah Mata Kuliah')
@section('content')
<div class="container">
    <div class="row mt-5 py-5">

        <center>
            <h3 class="mb-4">Form Tambah Mata Kuliah</h3>
        </center>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="/matkul" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="kode_matkul" placeholder="name@example.com" value="{{ old('kode_matkul') }}">
                        <label for="floatingInput">Kode Mata Kuliah</label>
                        @error('kode_matkul')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nama_matkul" placeholder="name@example.com" {{ old('nama_matkul') }}>
                        <label for="floatingInput">Nama Mata Kuliah</label>
                        @error('nama_matkul')
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
