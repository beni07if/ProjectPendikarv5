<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Admin;
use App\User;
use Session;
use Hash;
use Auth;
use App\NilaiPeriodik;
use App\Pengaduan;
use App\Http\Middleware\Role;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('koordinator.mahasiswa.index');
    // }

    public function changePasswordForm()
    {
        return view('mahasiswa.changePasswordForm');
    }

    public function changePasswordSubmitAdmin(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return back()->with('error', 'password lama tidak ditemukan');
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return back()->with('error', 'password lama tidak boleh sama dengan password baru');
        }
        // $request->validate([
        //     'current-passwrod' => 'required',
        //     'new-password' => 'required|string|min:4|confirmed'
        // ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return back()->with('message', 'Password berhasil diubah');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = User::all();
        $koordinator = Admin::all();
        // $mahasiswa = User::where('id', 1)->get();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.index', compact('koordinator', 'user'));
    }
    public function indexTutor()
    {
        $user = $this->middleware('auth');
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        return view('tutor.mahasiswa.index', compact('mahasiswa', 'user'));
    }
    public function indexMahasiswa()
    {
        $user = $this->middleware('auth');
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        return view('mahasiswa.mahasiswa.index', compact('mahasiswa', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = Mahasiswa::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new User;
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $mahasiswa = Mahasiswa::find($id);
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('adminSekretaris.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->name = $request->input('name');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->fakultas = $request->input('fakultas');
        $mahasiswa->prodi = $request->input('prodi');
        $mahasiswa->no_hp = $request->input('no_hp');
        $mahasiswa->keluarga = $request->input('keluarga');

        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("foto/adminSekretaris/", $fileName);

        $mahasiswa->foto = $fileName;
        // $mahasiswa->foto = $request->file('foto');
        $mahasiswa->periode = $request->input('periode');
        $mahasiswa->role = $request->input('role');
        $mahasiswa->password = bcrypt($request->input('password'));

        $mahasiswa->save($request->all());
        return redirect('/keluarga')->with('success', 'Data Mahasiswa Berhasil Diubah..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function changePasswordForm()
    // {
    //     return view('mahasiswa.changePasswordForm');
    // }
    public function dpns5()
    {
        return view('mahasiswa.changePasswordForm');
    }

    public function changePasswordSubmit(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return back()->with('error', 'password lama tidak ditemukan');
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return back()->with('error', 'password lama tidak boleh sama dengan password baru');
        }
        // $request->validate([
        //     'current-passwrod' => 'required',
        //     'new-password' => 'required|string|min:4|confirmed'
        // ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return back()->with('message', 'Password berhasil diubah');
    }

    public function dpns1()
    // {
    //     $dpns1 = NilaiPeriodik::all();
    //     return view('adminSekretaris.dpns1.index', compact('dpns1'));
    // }
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns1 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 2)->get();
        // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        return view('adminSekretaris.dpns.dpns1', compact('dpns1', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns2()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns2 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 3)->get();
        // $dpns2 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 9)->get();
        return view('adminSekretaris.dpns.dpns2', compact('dpns2', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns3()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns3 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 5)->get();
        // $dpns3 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 13)->get();
        return view('adminSekretaris.dpns.dpns3', compact('dpns3', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function detailDpns1()
    {
        $mahasiswa = NilaiPeriodik::all();
        return view('adminSekretaris.dpns1.detailDpns1', compact('mahasiswa'));
    }

    public function dpna()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpna = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 17)->get();
        return view('adminSekretaris.dpna.index3', compact('dpna', 'mahasiswa', 'user'));
    }

    public function pengaduan()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.pesanIndexVsKoor', compact('mahasiswa'));
    }
    public function pesanVsKoor()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.pesanVsKoor', compact('mahasiswa'));
    }

    public function pesanVsMhs()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.pesanVsMhs', compact('mahasiswa'));
    }

    public function keluarga()
    {
        // $mahasiswa = User::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.daftarMahasiswa', compact('mahasiswa'));
    }

    public function EditMahasiswa($id)
    {
        $mahasiswa = User::find($id);
        // $mahasiswa = User::where('id', $id)->get();
        // $mahasiswa = User::where('id', $id)->where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.editMahasiswa', compact('mahasiswa'));
    }

    public function bantuan()
    {
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.bantuan.index');
    }

    public function listKeluarga()
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = User::all();
        $mahasiswa = User::where('role', 'sekretaris')->get();
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.listKeluarga', compact('mahasiswa', 'user'));
    }

    public function daftarMhsVsKeluarga($keluarga)
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = User::all();
        // $mahasiswa = User::find($keluarga);
        // $klg = $keluarga;
        $mahasiswa = User::where('keluarga', $keluarga)->get();
        // if ($mahasiswa->keluarga == 1){
        //     $keluagaTest = $kls;
        // } else {
        //     $keluagaTest = 'sip';
        // }
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.daftarMahasiswaVsKeluarga', compact('mahasiswa', 'user'));
    }

    public function detailMhs($id)
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = User::all();
        // $keluarga = User::find($id);
        $mahasiswa = User::where('id', $id)->get();
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.detailMhs', compact('mahasiswa', 'user'));
    }

    public function editDetailMhs($id)
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = User::all();
        // $keluarga = User::find($id);
        $mahasiswa = User::find($id);
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.editDetailMhs', compact('mahasiswa', 'user'));
    }

    public function updateMhs(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->name = $request->input('name');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->fakultas = $request->input('fakultas');
        $mahasiswa->prodi = $request->input('prodi');
        $mahasiswa->no_hp = $request->input('no_hp');
        $mahasiswa->keluarga = $request->input('keluarga');

        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("foto/adminSekretaris/", $fileName);

        $mahasiswa->foto = $fileName;
        // $mahasiswa->foto = $request->file('foto');
        $mahasiswa->periode = $request->input('periode');
        $mahasiswa->role = $request->input('role');
        $mahasiswa->password = bcrypt($request->input('password'));

        $mahasiswa->save($request->all());
        // return redirect('/detail-mahasiswa/{$id}');
        return back();
    }

    public function daftarAllMhs()
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', '3')->get();
        // $mahasiswa = User::all();
        return view('koordinator.mahasiswa.daftarMahasiswa', compact('mahasiswa', 'user'));
    }

    public function editDataKoordinator()
    {
        $user = $this->middleware('auth:admin');
        $koordinator = Admin::all();
        return view('koordinator.mahasiswa.indexEdit', compact('koordinator', 'user'));
    }

    public function updateDataKoordinator(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $koordinator = Admin::findOrFail($id);
        $koordinator->name = $request->input('name');
        $koordinator->nip = $request->input('nip');
        $koordinator->email = $request->input('email');
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("foto/adminSekretaris/", $fileName);
        $koordinator->foto = $fileName;
        $koordinator->save($request->all());
        // return redirect('/detail-mahasiswa/{$id}');
        return back();
    }
}

