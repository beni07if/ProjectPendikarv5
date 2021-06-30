<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use DB;
use Session;
use Hash;
use Auth;
use App\NilaiPeriodik;
use App\Pengaduan;
use App\Http\Middleware\Role;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * +
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->middleware(['auth:mahasiswa']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $mahasiswa = User::all();
        return view('adminSekretaris.mahasiswa.index', compact('mahasiswa', 'user'));
    }
    public function indexEditMhs()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('id', auth()->user()->id)->get();
        // $mahasiswa = User::all();
        return view('adminSekretaris.mahasiswa.indexEditMhs', compact('mahasiswa', 'user'));
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
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);
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
        return redirect()->route('keluarga');
        // return back()->with('message', 'Mahasiswa berhasil ditambahkan');
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
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
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
        // $mahasiswa->password = bcrypt($request->input('password'));

        $mahasiswa->save($request->all());
        return redirect('/keluarga')->with('message', 'Data Mahasiswa Berhasil Diubah..');
        // return back()->with('message', 'Mahasiswa berhasil Diubah');
    }

    public function updateDataMhs(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->name = $request->input('name');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
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

        $mahasiswa->save($request->all());
        // return redirect('/')->with('message', 'Data Mahasiswa Berhasil Diubah..');
        return back()->with('message', 'Mahasiswa berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/keluarga')->with('success', 'Mahasiswa Berhasil Dihapus..');
    }

    public function changePasswordForm()
    {
        return view('mahasiswa.changePasswordForm');
    }
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
        // $count = NilaiPeriodik::where('pekan_ke')
        $dpns1 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 5)->get();
        // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        return view('adminSekretaris.dpns.dpns1', compact('dpns1', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns1Show($id)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('adminSekretaris.dpns.dpns1Show', compact('nilaiPeriodik', 'mahasiswa'));
    }

    public function dpns2()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns2 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 9)->get();
        // $dpns2 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 9)->get();
        return view('adminSekretaris.dpns.dpns2', compact('dpns2', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns2Show($id)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('adminSekretaris.dpns.dpns2Show', compact('nilaiPeriodik', 'mahasiswa'));
    }

    public function dpns3()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns3 = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 13)->get();
        // $dpns3 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 13)->get();
        return view('adminSekretaris.dpns.dpns3', compact('dpns3', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns3Show($id)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('adminSekretaris.dpns.dpns3Show', compact('nilaiPeriodik', 'mahasiswa'));
    }

    public function detailDpns1()
    {
        $mahasiswa = NilaiPeriodik::all();
        return view('adminSekretaris.dpns1.detailDpns1', compact('mahasiswa'));
    }

    public function dpnaweik()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpna = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 17)->get();
        // $dpna = DB::select(DB::raw("SELECT * FROM nilai_periodiks WHERE user_id = 1"));
        // $dpna = NilaiPeriodik::query();
        // $dpna->withCount([
        //     'activity AS yoursum' => function ($dpna) {
        //         $dpna->select(DB::raw("SUM(amount_total) as paidsum"))->where('user_id', auth()->user()->id)->where('pekan_ke', '<', 17)->get();
        //     }
        // ]);
        return view('adminSekretaris.dpna.index3', compact('dpna', 'mahasiswa', 'user'));
    }

    public function pengaduan()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.pesanIndexVsKoor', compact('mahasiswa'));
    }

    public function daftarPengaduanMhs()
    {
        $mahasiswa = User::where('id', auth()->user()->id)->get();
        $pengaduan = Pengaduan::where('user_id', auth()->user()->id)->get();
        // $pengaduan = Pengaduan::where('user_id', auth()->user()->($mhs->id AND 1))->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.pesanIndexVsMhs', compact('pengaduan', 'mahasiswa'));
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
        // $mhs = $mahasiswa->name;
        if (Auth::user()->role == 'sekretaris') {
            $timbul = '';
            $pesan = 'Detail';
            $icon = 'fas fa-eye';
            $buttonViewEdit = 'btn btn-info btn-sm';
        } else {
            $timbul = 'hidden';
            $pesan = 'Detail';
            $icon = 'fa fa-eye';
            $buttonViewEdit = 'btn btn-info btn-sm';
        }
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.daftarMahasiswa', compact('mahasiswa', 'buttonViewEdit', 'icon', 'timbul', 'pesan'));
    }

    public function EditMahasiswa($id)
    {
        if (Auth::user()->id == $id) {
            $timbul = '';
            $pesan = 'Edit';
            $disabled = '';
        } else {
            $timbul = 'hidden';
            $pesan = 'Lihat';
            $disabled = 'disabled';
        }

        if (Auth::user()->role == 'sekretaris') {
            $disrole = '';
        } else {
            $disrole = 'hidden';
        }
        $mahasiswa = User::find($id);
        // $mahasiswa = User::where('id', $id)->get();
        // $mahasiswa = User::where('id', $id)->where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.mahasiswa.editMahasiswa', compact('disabled', 'disrole', 'mahasiswa', 'timbul', 'pesan'));
    }

    public function bantuan()
    {
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.bantuan.index');
    }


    public function pesanPersonalVsMhs($user_id)
    {
        $user = $this->middleware('auth');
        // {{ Auth::user()->name }}
        $mahasiswa = User::where('id', $user_id);
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $pengaduan = Pengaduan::where('user_id', $user_id)->get();
        $pengaduan = Pengaduan::where('user_id', $user_id)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('koordinator.pengaduan.pesanPersonalVsMhs', compact('pengaduan', 'mahasiswa', 'user'));
    }

    public function tambahMahasiswa()
    {
        // $user = $this->middleware('auth');
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        return view('adminSekretaris.mahasiswa.tambahMahasiswa', compact('mahasiswa'));
    }


    public function dpnaMhs()
    {
        // $user = $this->middleware('auth:admin');
        // // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpna = NilaiPeriodik::where('pekan_ke', '<', 17)->get();
        // // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        // return view('koordinator.dpns.dpnaHome', compact('mahasiswa', 'user', 'dpna'));
        // // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));

        // $data = DB::table('users')->where('keluarga', 145)
        $data = DB::table('users')
            ->join('nilai_periodiks', 'users.id', '=', 'nilai_periodiks.user_id')
            ->select('*')
            ->get();
        $mahasiswa = User::all();

        $diolah = [];

        foreach ($data as $baris) {
            // echo $baris->name;
            $objk = (object)[];
            $objk->name = $baris->name;
            $objk->nim = $baris->nim;
            $objk->user_id = (int)$baris->user_id;
            $objk->keluarga = (int)$baris->keluarga;
            $objk->prodi = $baris->prodi;
            $objk->jenis_kelamin = $baris->jenis_kelamin;

            //kalkulasi sholat
            $sholats = $baris->sholat_fardu;
            if (($sholats) > 32) {
                $sholat = 100;
            } elseif (($sholats) > 28) {
                $sholat = 90;
            } elseif (($sholats) > 25) {
                $sholat = 80;
            } elseif (($sholats) > 21) {
                $sholat = 70;
            } elseif (($sholats) > 18) {
                $sholat = 60;
            } elseif (($sholats) > 14) {
                $sholat = 50;
            } elseif (($sholats) > 11) {
                $sholat = 40;
            } elseif (($sholats) > 7) {
                $sholat = 30;
            } elseif (($sholats) > 4) {
                $sholat = 20;
            } elseif (($sholats) > 0) {
                $sholat = 10;
            } else {
                $sholat = 0;
            }

            // end kalkulasi sholat

            //kalkulasi dzikir
            $dzikirs =  $baris->dzikir;
            if (($dzikirs) > 105) {
                $dzikir = 100;
            } elseif (($dzikirs) > 83) {
                $dzikir = 80;
            } elseif (($dzikirs) > 62) {
                $dzikir = 60;
            } elseif (($dzikirs) > 41) {
                $dzikir = 40;
            } elseif (($dzikirs) > 20) {
                $dzikir = 20;
            } elseif (($dzikirs) > 0) {
                $dzikir = 10;
            } else {
                $dzikir = 0;
            }

            //end kalkulasi dzikir

            // $jenisKelamin = $objk->jenis_kelamin;
            // if (($jenisKelamin) = 'laki-laki'){

            // }
            //kalkulasi tilawah
            $saritilawahs = $baris->tilawatil_quran;
            if (($saritilawahs) > 45) {
                $saritilawah = 100;
            } elseif (($saritilawahs) > 40) {
                $saritilawah = 90;
            } elseif (($saritilawahs) > 35) {
                $saritilawah = 80;
            } elseif (($saritilawahs) > 30) {
                $saritilawah = 70;
            } elseif (($saritilawahs) > 25) {
                $saritilawah = 60;
            } elseif (($saritilawahs) > 20) {
                $saritilawah = 50;
            } elseif (($saritilawahs) > 15) {
                $saritilawah = 40;
            } elseif (($saritilawahs) > 5) {
                $saritilawah = 20;
            } elseif (($saritilawahs) > 0) {
                $saritilawah = 10;
            } else {
                $saritilawah = 0;
            }
            //end kalkulasi tilawah
            $kehadiran = (($baris->kehadiran) * 10 / 100);

            $ukhuwahIslamiyah = (($baris->ukhuwah_islamiyah) * 10 / 100);
            $ukhuwahWathoniyah = (($baris->ukhuwah_wathoniyah) * 10 / 100);

            $farduKifayah = (($baris->fardu_kifayah) * 10 / 100);
            $hafalanDoa = (($baris->hafalan_doa) * 10 / 100);
            $bacaQuran = (($baris->baca_quran) * 10 / 100);

            $shlt = ($sholat * 10 / 100);
            $tilawah = ($saritilawah * 10 / 100);
            $dzikr = ($dzikir * 10 / 100);

            $bukuHarian = (($baris->buku_harian) * 10 / 100);

            $tugasTerstruktur = ($ukhuwahIslamiyah + $ukhuwahWathoniyah);
            $ujianKompetensi = ($farduKifayah + $hafalanDoa + $bacaQuran);
            $aktivitasHarian = ($shlt + $dzikr + $tilawah);
            $dpnaa = ($kehadiran + $tugasTerstruktur + $ujianKompetensi + $aktivitasHarian + $bukuHarian);

            $objk->dpnaa = $dpnaa;

            array_push($diolah, $objk);

            // $diolah[] = $objk;
            // echo ($i>0&& $i<$banyak_nilai ?',':'').json_encode($objk);

        }

        usort($diolah, function ($first, $second) {
            return $first->user_id > $second->user_id;
        });

        $data_akhir = [];
        $data_sementara = (object)[];

        for ($j = 0; $j < count($diolah); $j++) {
            // echo count($diolah);
            // echo $diolah[$j]->name;
            if ($j == 0) {
                $data_sementara->name = $diolah[$j]->name;
                $data_sementara->nim = $diolah[$j]->nim;
                $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                $data_sementara->user_id = $diolah[$j]->user_id;
                $data_sementara->keluarga = $diolah[$j]->keluarga;
                $data_sementara->prodi = $diolah[$j]->prodi;
                $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
            } else {


                if ($data_sementara->user_id == $diolah[$j]->user_id) {
                    $prev_dpna = $data_sementara->dpnaa;
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->nim = $diolah[$j]->nim;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa + $prev_dpna;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
                } else {
                    $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
                    array_push($data_akhir, $data_sementara);
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->nim = $diolah[$j]->nim;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
                    // echo $j;
                    // echo count($diolah)-1;
                    // echo $j == count($diolah)-1;
                    if ($j == count($diolah) - 1) {
                        $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
                        array_push($data_akhir, $data_sementara);
                    }
                }
            }
        }
        // echo "\n\nData akhir:\n";
        // foreach ($data_akhir as $data_akhirr) {
        //     echo $data_akhirr->name;
        // }
        // $mahasiswa = User::get();
        // foreach($mahasiswa as $mhs){
        //     $id_mhs = $mhs->id;
        //     $data = NilaiPeriodik::selectRaw('count(id) as jlh_data','SUM(kehadiran + ukhuwah_islamiyah + ukhuwah_wathoniyah + fardu_kifayah + hafalan_doa + baca_quran + sholat_fardu + tilawatil_quran + dzikir + buku_harian) as total_nilai_akhir')->where('id_user', $id_mhs)->first();
        //     $rata_rata = $data->total_nilai_akhir / $data->jlh_data;
        // }
        // return $data_akhir;
        return view('adminSekretaris.dpna.index3', compact('data_akhir', 'mahasiswa'));
    }
}
