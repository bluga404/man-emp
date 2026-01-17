@extends('layouts.mantis')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Divisi {{ $divisi->nama_divisi }}</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisi->pegawai as $index => $item )
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection