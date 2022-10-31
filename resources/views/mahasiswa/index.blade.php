@extends('main')

@section('title', 'Mahasiswa')
@section('content')
<div class="container">
    <div class="row mt-5 py-3">
        <div class="col">
            <div class="float-start">
                <h1 class="">Mahasiswa</h1>
                <p class="">Halaman ini menampilkan data <span style="color:red;">Mahasiswa</span></p>
            </div>
            <div class="float-end py-4">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
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
                        <th scope="col">NPM</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tempat,Tanggal Lahir</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswas as $mahasiswa)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->alamat }}</td>
                        <td>{{ $mahasiswa->ttl }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="100px" height="100px">
                        </td>
                        <td>
                            <a href="/mahasiswa/{{ $mahasiswa->id }}" class="btn btn-info mb-3" style="color:white;">Detail</a>
                            <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning mb-3" style="color:white;">Edit</a>
                            <form action="/mahasiswa/{{ $mahasiswa->id}}" method="post" class="d-inline">
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

