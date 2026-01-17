@extends('layouts.mantis')

@section('content')
<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Data Divisi</div>
            <div>
                <a href="{{ route('divisi.create') }}" class="btn btn-primary">
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="justify-content-start">No</th>
                        <th>Divisi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisi as $index => $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->nama_divisi }}</td>
                        <td>
                            <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('divisi.edit', $item->id) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('divisi.show', $item->id) }}">Detail</a></li>
                                <li><button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $item->id }}">Hapus Data</button></li>
                            </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($divisi as $item)
    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Data akan terhapus secara permanen, klik <b>lanjutkan</b> untuk menghapus data</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

            <form action="{{ route('divisi.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Lanjutkan</button>
            </form>
        </div>
        </div>
    </div>
    </div>
@endforeach

@endsection