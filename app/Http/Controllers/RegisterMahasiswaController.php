<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use Session;
use Hash;
use Auth;
use App\NilaiPeriodik;
use App\Pengaduan;
use App\Http\Middleware\Role;

class RegisterMahasiswaController extends Controller
{
    public function register()
    {
        $mahasiswa = Mahasiswa::all();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.register', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $mahasiswa = new User;
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->keluarga = $request->keluarga;
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('foto/adminSekretaris/', $filename);
        //     $mahasiswa->foto = $filename;
        // } else {
        //     return $request;
        //     $mahasiswa->foto = '';
        // }

        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("foto/adminSekretaris/", $fileName);

        $mahasiswa->foto = $fileName;
        // $tambah->save();

        // return redirect()->to('/');
        $mahasiswa->periode = $request->periode;
        $mahasiswa->role = $request->role;
        $mahasiswa->password =  bcrypt($request->password);
        $mahasiswa->created_at = now();
        $mahasiswa->updated_at = now();
        $mahasiswa->save();
        // return redirect()->route('keluarga');
        return back()->with('message', 'Mahasiswa berhasil ditambahkan');
    }
}
