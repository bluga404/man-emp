@extends('layouts.mantis')
@section('content')
<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Form Data Pegawai</div>
            <div>
                <a href="{{ route('pegawai.index') }}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group my-2">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" 
                    class="form-control @error('nama_pegawai') is-invalid @enderror" 
                    value="{{ $pegawai->nama_pegawai }}" autofocus>
                @error('nama_pegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="divisi_id">Divisi</label>
                <select name="divisi_id" id="divisi_id" 
                        class="form-control @error('divisi_id') is-invalid @enderror">
                    <option value="">Pilih Divisi</option>
                    @foreach ($divisi as $item)
                        <option value="{{ $item->id }}" {{ $pegawai->divisi_id == $item->id ? 'selected' : '' }}>{{ $item->nama_divisi }}</option>
                    @endforeach
                </select>
                @error('divisi_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ $pegawai->email }}" autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" 
                    class="form-control @error('foto') is-invalid @enderror" 
                    value="{{ $pegawai->foto }}" autofocus>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" 
                    class="form-control @error('nik') is-invalid @enderror" 
                    value="{{ $pegawai->nik }}" readonly>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="umur">Umur</label>
                <input type="number" name="umur" id="umur" 
                    class="form-control @error('umur') is-invalid @enderror" 
                    value="{{ $pegawai->umur }}">
                @error('umur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" 
                    class="form-control @error('tempat_lahir') is-invalid @enderror" 
                    value="{{ $pegawai->tempat_lahir }}">
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="tanggal_lahir">Tanggal Lahir (bulan/tanggal/tahun)</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                    class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                    value="{{ $pegawai->tanggal_lahir }}">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" 
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih Jenis Kelamin</option>
                    
                    <option value="Laki-laki" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10" 
                        class="form-control @error('alamat') is-invalid @enderror">{{ $pegawai->alamat }}</textarea>
                @error('alamat')
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