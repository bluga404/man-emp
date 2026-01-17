@extends('layouts.mantis')
@section('content')

<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Form Data Divisi</div>
            <div>
                <a href="{{ route('divisi.index') }}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('divisi.update', $divisi->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group my-2">
                <label for="nama_divisi">Nama Divisi</label>
                <input type="text" name="nama_divisi" id="nama_divisi" 
                    class="form-control @error('nama_divisi') is-invalid @enderror" 
                    value="{{ $divisi->nama_divisi }}" autofocus>
                @error('nama_divisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection