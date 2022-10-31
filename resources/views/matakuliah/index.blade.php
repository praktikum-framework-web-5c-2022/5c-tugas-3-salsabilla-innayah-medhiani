@extends('main')
@section('title', 'Mata Kuliah')
@section('content')
<div class="container">
    <div class="row mt-5 py-3">
        <div class="col">
            <div class="float-start">
                <h1 class="">Mata Kuliah</h1>
                <p class="">Halaman ini menampilkan data <span style="color:red;">Mata Kuliah</span></p>
            </div>
            <div class="float-end py-4">
                <a href="{{ route('matkul.create') }}" class="btn" style="background-color: #800000; color: white;">Tambah</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matkuls as $matkul)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $matkul->kode_matkul }}</td>
                        <td>{{ $matkul->nama_matkul }}</td>
                        <td>
                            <a href="/matkul/{{ $matkul->id }}" class="btn btn-info" style="color:white;">Detail</a>
                            <a href="/matkul/{{ $matkul->id }}/edit" class="btn btn-warning" style="color:white;">Edit</a>
                            <form action="/matkul/{{ $matkul->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-md" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                            </form>

                        </td>
                    </tr>

                    @empty
                    <td colspan="10">Tidak ada data ..</td>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
