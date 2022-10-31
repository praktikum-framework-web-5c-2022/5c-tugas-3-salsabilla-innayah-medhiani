@extends('main')

@section('title', 'Dosen')
@section('content')
<div class="container">
    <div class="row mt-5 py-3">
        <div class="col">
            <div class="float-start">
                <h1 class="">Dosen</h1>
                <p class="">Halaman ini menampilkan data <span style="color:red;">Dosen</span></p>
            </div>
            <div class="float-end py-4">
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah</a>
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
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tempat,Tanggal Lahir</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dosens as $dosen)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->jenis_kelamin }}</td>
                        <td>{{ $dosen->alamat }}</td>
                        <td>{{ $dosen->ttl }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$dosen->photo) }}" width="100px" height="100px">
                        </td>
                        <td>
                            <a href="/dosen/{{ $dosen->id }}" class="btn btn-info" style="color:white;">Detail</a>
                            <a href="/dosen/{{ $dosen->id }}/edit" class="btn btn-warning" style="color:white;">Edit</a>
                            <form action="/dosen/{{ $dosen->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-md" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    @empty
                    <td colspan="10">Tidak ada data ..</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
