@extends('layouts.mantis')
@section('content')

<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Data User</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                    <tr>
                        <td>{{ $index + 1}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role?->role_name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRole{{ $item->id }}">
                                Ganti role
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($users as $item)
<!-- Modal -->
<div class="modal fade" id="modalRole{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="my-2 text-danger">Mengganti role dapat mengubah hak akses dari user, Klik Ganti Role jika sudah yakin.</p>
        <form action="{{ route('users.update-role') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $item->id }}">
        <div>
            <label for="role_id">Tentukan Role Akses</label>
            <select name="role_id" id="role_id" class="form-control">
                <option value="">Pilih role</option>
                @foreach ($roles as $item)
                    <option value="{{ $item->id }}">{{ $item->role_name }}</option>                
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mt-2">
                Ganti Role
            </button>
        </div>    
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection