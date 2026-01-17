<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        $divisi = Divisi::with('pegawai')->get();
        return view('pegawai.index', compact('pegawai', 'divisi'));
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('pegawai.create', compact('divisi'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_pegawai'  => 'required',
            'divisi_id'     => 'required|exists:divisis,id',
            'email'         => 'required|email|unique:users,email',
            'foto'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nik'           => 'required|numeric|unique:pegawais,nik',
            'alamat'        => 'required',
            'umur'          => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama_pegawai.required'  => 'Nama pegawai harus diisi.',
            'email.required'         => 'Email harus diisi.',
            'email.email'            => 'Email tidak valid.',
            'foto.required'          => 'Foto harus diisi', 
            'foto.image'    => 'File harus berupa gambar',
            'foto.max'      => 'Ukuran foto terlalu besar (maksimal 2 MB)',
            'nik.required'           => 'NIK harus diisi.',
            'nik.numeric'            => 'NIK harus berupa angka.',
            'nik.unique'             => 'NIK sudah terdaftar.',
            'alamat.required'        => 'Alamat harus diisi.',
            'umur.required'          => 'Umur harus diisi.',
            'umur.numeric'           => 'Umur harus berupa angka.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date'     => 'Tanggal lahir harus berupa tanggal.',
            'tempat_lahir.required'  => 'Tempat lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in'       => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        ]);

        $foto = $request->file('foto');
        $filename = Str::uuid() . '.' . $foto->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('foto_pegawai', $foto, $filename);

        $newRequest = $request->all();
        $newRequest['foto'] = $filename;


        // Pegawai::create([
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'nik' => $request->nik,
        //     'alamat' => $request->alamat,
        //     'umur' => $request->umur,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        // ]);

        $newData = Pegawai::create($newRequest);


        $user = User::create([
            'name' => $newData->nama_pegawai,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'pegawai_id' => $newData->id,
        ]);

        $newData->user_id = $user->id;
        $newData->save();

        Alert::success('Berhasil', 'Data berhasil ditambahkan.');

        return redirect()->route('pegawai.index');
        // dd($request->all());
    }

    public function edit(String $id)
    {
        $pegawai = Pegawai::find($id);
        $divisi = Divisi::all();
        return view('pegawai.edit', compact('pegawai', 'divisi'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        // dd($pegawai->toArray());
        $request->validate([
            'nama_pegawai'  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('pegawais', 'email')->ignore($pegawai->id),
            ],
            'nik' => [
                'required',
                'numeric',
                Rule::unique('pegawais', 'nik')->ignore($pegawai->id),
            ],
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat'        => 'required',
            'umur'          => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama_pegawai.required'  => 'Nama pegawai harus diisi.',
            'email.required'  => 'Email harus diisi.',
            'email.email'  => 'Email tidak valid.',
            'foto.required'          => 'Foto harus diisi', 
            'foto.image'    => 'File harus berupa gambar',
            'foto.max'      => 'Ukuran foto terlalu besar (maksimal 2 MB)',
            'nik.required'           => 'NIK harus diisi.',
            'nik.numeric'            => 'NIK harus berupa angka.',
            'nik.unique'             => 'NIK sudah terdaftar.',
            'alamat.required'        => 'Alamat harus diisi.',
            'umur.required'          => 'Umur harus diisi.',
            'umur.numeric'           => 'Umur harus berupa angka.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date'     => 'Tanggal lahir harus berupa tanggal.',
            'tempat_lahir.required'  => 'Tempat lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in'       => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        ]);

        $fileName = $pegawai->foto;
        $foto = $request->file('foto');

        if ($foto){
            $fileName = Str::uuid() . '.' . $foto->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('foto_pegawai', $foto, $fileName);
        } else {
            $fileName = $pegawai->foto;
        }

        $newRequest = $request->except('nik');
        $newRequest['foto'] = $fileName;

        $pegawai->update($newRequest);

        Alert::success('Berhasil', 'Data berhasil diperbarui.');

        // if store all info
        // $pegawai->update($request->all());

        // $pegawai -> update([
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'alamat' => $request->alamat,
        //     'umur' => $request->umur,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tenggal_lahir' => $request->tenggal_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        // ]);

        // shortened
        return redirect()->route('pegawai.index');
    }

    public function destroy(String $id)
    {
        $pegawai = Pegawai::find($id);

        if($pegawai->foto != null){
            Storage::disk('public')->delete('foto_pegawai/' . $pegawai->foto);
        }

        if ($pegawai->user){
            $pegawai->user->delete();
        }

        $pegawai->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus.');

        return redirect()
            ->route('pegawai.index');
    }
}
