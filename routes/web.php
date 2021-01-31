<?php

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'MahasiswaController@index')->name('home');
// Route::get('/', function () {
//     // return view('welcome');
//     return view('login5');
// })->name('welcome');

Route::get('/login..', function () {
    // return view('welcome');
    return view('login');
})->name('login..');
Route::get('/login2..', function () {
    // return view('welcome');
    return view('login2');
})->name('login2..');
Route::get('/login3', function () {
    // return view('welcome');
    return view('login3');
})->name('login3');
Route::get('/login4', function () {
    // return view('welcome');
    return view('login4');
})->name('login4');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'DpnaController@index')->name('beranda');
// Route::resource('/nilaiperiodik', 'NilaiPeriodikController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    // Route::get('/', 'AdminController@index')->name('admin.home');
    // Route::get('/', 'SekretarisNilaiPeriodikController@index')->name('sekretaris.home');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});

Route::group(['prefix' => 'sekretaris'], function () {
    Route::get('/login', 'AuthSekretaris\LoginController@showLoginForm')->name('sekretaris.login');
    Route::post('/login', 'AuthSekretaris\LoginController@login')->name('sekretaris.login.submit');
    Route::get('/', 'SekretarisNilaiPeriodikController@index')->name('sekretaris.home');
});

Route::group(['prefix' => 'mahasiswa'], function () {
    // Route::get('/login', 'AuthMahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
    // Route::post('/login', 'AuthMahasiswa\LoginController@login')->name('mahasiswa.login.submit');
    Route::get('/registerSekretaris', 'RegisterMahasiswaController@register')->name('mahasiswa.register');
    Route::get('/index', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/indexEditMhs', 'MahasiswaController@indexEditMhs')->name('indexEditMhs');
    Route::get('/tambahMahasiswa', 'MahasiswaController@tambahMahasiswa')->name('tambahMahasiswa');
    Route::get('/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::post('/update/{id}', 'MahasiswaController@update')->name('mahasiswa.update');
    Route::post('/updateDataMhs/{id}', 'MahasiswaController@updateDataMhs')->name('updateDataMhs');
    Route::get('/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::post('/store', 'MahasiswaController@store')->name('mahasiswa.store');
    Route::post('/registerStore', 'RegisterMahasiswaController@store')->name('register.mahasiswa.store');
    Route::get('/home', 'MahasiswaController@index')->name('mahasiswa.home');
    Route::post('/delete/{id}', 'MahasiswaController@destroy')->name('mahasiswa.delete');
});

Route::group(['prefix' => 'nilaiPeriodik'], function () {
    Route::get('/apiNP', 'NilaiPeriodikController@apiNilaiPeriodik')->name('apiNilaiPeriodik');
    Route::get('/index', 'NilaiPeriodikController@index')->name('nilaiPeriodik.index');
    Route::get('/create', 'NilaiPeriodikController@create')->name('nilaiPeriodik.create');
    Route::get('/tambahNilaiPeriodik', 'NilaiPeriodikController@tambahNilaiPeriodik')->name('tambahNilaiPeriodik');
    Route::get('/show', 'NilaiPeriodikController@show')->name('showNilaiPeriodik');
    Route::get('/edit/{id}', 'NilaiPeriodikController@edit')->name('nilaiPeriodik.edit');
    Route::get('/', 'NilaiPeriodikController@index')->name('nilaiPeriodik.home');
    Route::post('/store', 'NilaiPeriodikController@store')->name('nilaiPeriodik.store');
    Route::post('/update', 'NilaiPeriodikController@update')->name('nilaiPeriodik.update');
    Route::post('/destroy/{id}', 'NilaiPeriodikController@destroy')->name('nilaiPeriodik.destroy');
    Route::get('/eloquent', 'NilaiPeriodikController@eloquent')->name('nilaiPeriodik.eloquent');
});

Route::resource('nilaiPeriodik', 'NilaiPeriodikController');
Route::get('api/nilaiperiodik', 'NilaiPeriodikController@apiNilaiPeriodik')->name('apiNilaiPeriodik');
// Route::patch('nilaiPeriodik/{nilaiPeriodik}', 'NilaiPeriodikController@update')->name('nilaiPeriodik.update');
// Route::patch('nilaiPeriodik/{nilaiPeriodik}/patch', 'NilaiPeriodikController@update')->name('nilaiPeriodik.patch');
// Route::group(['prefix' => 'dpns1'], function () {
//     Route::get('/apiNP', 'DPNS1Controller@apiDpns1')->name('apiDpns1');
//     Route::get('/index', 'DPNS1Controller@index')->name('dpns1');
//     Route::get('/create', 'DPNS1Controller@create')->name('createDpns1');
//     Route::get('/show', 'DPNS1Controller@show')->name('showDpns1');
//     Route::get('/edit', 'DPNS1Controller@edit')->name('editDpns1');
//     Route::get('/', 'DPNS1Controller@index')->name('dpns1.index');
//     Route::get('/detailDpns1', 'DPNS1Controller@detailDpns1')->name('detailDpns1');
// });
// Route::get('dpns11', 'DpnsController@dpns11')->name('dpns11');
// Route::get('dpns222', 'MahasiswaController@dpns1')->name('dpns222');
// Route::get('dpns33', 'DpnsController@dpns33')->name('dpns33');
Route::get('dpns11', 'MahasiswaController@dpns1')->name('dpns11');
Route::get('dpns1-show/{id}', 'MahasiswaController@dpns1Show')->name('dpns1Show');
// Route::get('dpns111', 'MahasiswaController@dpns1')->name('dpns111');
Route::get('dpns22', 'MahasiswaController@dpns2')->name('dpns22');
Route::get('dpns2-show/{id}', 'MahasiswaController@dpns2Show')->name('dpns2Show');
Route::get('dpns33', 'MahasiswaController@dpns3')->name('dpns33');
Route::get('dpns3-show/{id}', 'MahasiswaController@dpns3Show')->name('dpns3Show');
Route::get('bantuan', 'MahasiswaController@bantuan')->name('bantuan');

Route::group(['prefix' => 'dpns2'], function () {
    Route::get('/apiNP', 'DPNS2Controller@apiDpns2')->name('apiDpns2');
    Route::get('/index', 'DPNS2Controller@index')->name('dpns2');
    Route::get('/create', 'DPNS2Controller@create')->name('createDpns2');
    Route::get('/show', 'DPNS2Controller@show')->name('showDpns2');
    Route::get('/edit', 'DPNS2Controller@edit')->name('editDpns2');
    Route::get('/', 'DPNS2Controller@index')->name('dpns2.home');
});

Route::group(['prefix' => 'dpns3'], function () {
    Route::get('/apiNP', 'DPNS3Controller@apiDpns3')->name('apiDpns3');
    Route::get('/index', 'DPNS3Controller@index')->name('dpns3');
    Route::get('/create', 'DPNS3Controller@create')->name('createDpns3');
    Route::get('/show', 'DPNS3Controller@show')->name('showDpns3');
    Route::get('/edit', 'DPNS3Controller@edit')->name('editDpns3');
    Route::get('/', 'DPNS3Controller@index')->name('dpns3.home');
});

// Route::group(['prefix' => 'dpna'], function () {
//     Route::get('/apiNP', 'DPNAController@apiDpns1')->name('apiDpna');
//     Route::get('/index', 'DPNAController@index')->name('dpna');
//     Route::get('/create', 'DPNAController@create')->name('createDpna');
//     Route::get('/show', 'DPNAController@show')->name('showDpna');
//     Route::get('/edit', 'DPNAController@edit')->name('editDpna');
//     Route::get('/', 'DPNAController@index')->name('dpna.home');
// });
Route::get('/dpna', 'MahasiswaController@dpnaweik')->name('dpnaa');

// Route::group(['prefix' => 'pengaduan'], function () {
//     Route::get('/apiNP', 'PengaduanController@apiDpns1')->name('apiPengaduan');
//     Route::get('/index', 'PengaduanController@index')->name('pengaduan');
//     Route::get('/create', 'PengaduanController@create')->name('createPengaduan');
//     Route::get('/show', 'PengaduanController@show')->name('showPengaduan');
//     Route::get('/edit', 'PengaduanController@edit')->name('editPengaduan');
//     Route::get('/', 'PengaduanController@index')->name('dpna.home');
// });
Route::get('/pengaduan', 'MahasiswaController@pengaduan')->name('pengaduan');
// Route::get('/pesanVsKoor', 'MahasiswaController@pesanVsKoor')->name('pesanVsKoor');
Route::get('/pesanVsMhs', 'MahasiswaController@pesanVsMhs')->name('pesanVsMhs');
Route::get('/daftar-pengaduan-mhs', 'MahasiswaController@daftarPengaduanMhs')->name('daftarPengaduanMhs');

Route::get('/keluarga', 'MahasiswaController@keluarga')->name('keluarga');
Route::get('/tambahKeluarga', 'MahasiswaController@tambahKeluarga')->name('tambahKeluarga');
Route::get('/editMahasiswa/{id}', 'MahasiswaController@EditMahasiswa')->name('editMahasiswa');

Route::group(['prefix' => 'dpns'], function () {
    Route::get('/dpns1', 'DPNS1Controller@index')->name('dpns1');
    Route::get('/dpns1view/{id}', 'DPNS1Controller@show')->name('dpns1.show');
    Route::get('/dpns1d', 'DpnsController@dpns1')->name('dpns1.edit');
    Route::get('/dpns2', 'DpnsController@dpns2')->name('dpns2');
    Route::get('/dpns3', 'DpnsController@dpns3')->name('dpns3');
    Route::get('/dpna', 'DpnsController@dpna')->name('dpna');
    // Route::get('/show', 'DPNS3Controller@show')->name('showDpns3');
    // Route::get('/edit', 'DPNS3Controller@edit')->name('editDpns3');
    // Route::get('/', 'DPNS3Controller@index')->name('dpns3.home');
});


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login2', 'AuthController@postlogin')->name('login2');
Route::get('/logout', 'AuthController@logout')->name('logout');


// Route::get('/sekretaris', 'SekreatarisController@index')->name('sekretaris')->middleware('sekretaris');
Route::get('/mahasiswaa', 'NilaiPeriodikController@index')->name('mahasiswaa')->middleware(['auth', 'role']);
Route::get('/tutor', 'MahasiswaController@keluarga')->name('tutor')->middleware(['auth', 'role']);



// Route::get('/changePasswordForm', 'MahasiswaController@changePasswordForm')->name('changePasswordForm');
// Route::post('/changePasswordSubmit', 'MahasiswaController@changePasswordSubmit')->name('changePasswordSubmit');
Route::post('/changePasswordSubmit', 'MahasiswaController@changePasswordSubmit')->name('changePasswordSubmit');
Route::post('/changePasswordSubmitAdmin', 'AdminController@changePasswordSubmitAdmin')->name('changePasswordSubmitAdmin');
Route::get('/edit-data-koordinator', 'AdminController@editDataKoordinator')->name('editDataKoordinator');
Route::post('/update-data-koordinator/{id}', 'AdminController@updateDataKoordinator')->name('updateDataKoordinator');
// Route::post('/tambahMahasiswa', 'MahasiswaController@tambahMahasiswa')->name('tambahMahasiswa');

Route::post('/pengaduanSendMhs', 'PengaduanController@store')->name('pengaduan.sendMhs');
Route::get('/koordinators', 'AdminController@index')->name('koordinator.index');
Route::get('/koordinator', 'AdminController@haha')->name('admin.home');

Route::get('/mahasiswaaa', 'MahasiswaController@indexs')->name('mahasiswaaa')->middleware('role');
// Route::get('/mahasiswaaa', 'MahasiswaController@index')->name('sekretaris.index');
// Route::get('/mahasiswasss', function () {
//     // return view('sekretaris.index');
//     return "sssss";
//     // })->middleware(['auth', 'role'])->name('sekretaris.index');
// })->middleware(['auth', 'role'])->name('sekretaris.index');

Route::get('/mahasiswa', function () {
    return view('adminSekretaris.mahasiswa.index');
    // return 'sekretaris';
})->middleware(['auth', 'role'])->name('sekretarisIndex');

// Route::get('/tutor', function () {
//     return view('tutor.mahasiswa.index');
//     // return 'tutor';
// })->middleware(['auth', 'role'])->name('tutorIndex');

// Route::get('/mahasiswa', function () {
//     return view('anggotaKeluarga.mahasiswa.index');
//     // return 'mahasiswa';
// })->middleware(['auth', 'role'])->name('anggotaKeluargaIndex');

Route::get('/koordinator', function () {
    return view('koordinator.mahasiswa.index');
    // return 'koordinator';
})->middleware(['role', 'auth:admin'])->name('koordinatorIndex');

Route::get('/createmhs', function () {
    $post = new App\Mahasiswa();
    $post->name = 'mantul';
    $post->nim = 'mantul';
    $post->email = 'mantul@gmail.com';
    $post->prodi = 'mantul@gmail.com';
    $post->fakultas = 'mantul@gmail.com';
    $post->no_hp = 'mantul@gmail.com';
    $post->keluarga = 'mantul@gmail.com';
    $post->foto = 'mantul@gmail.com';
    $post->periode = 'mantul@gmail.com';
    $post->role = 'admin';
    $post->password = bcrypt('12345678');
    $post->save();
});

Route::get('/createadmin', function () {
    $post = new App\Admin();
    $post->name = 'Riadi Budiman';
    $post->nip = '123456789';
    $post->email = 'riadi@gmail.com';
    $post->foto = 'riadi.jpg';
    $post->password = bcrypt('rrrrrrrr');
    $post->save();
});

// Koordinator
// Route::get('/nilai-periodik-admin-index', 'NilaiPeriodikAdmin@index')->name('nilaiPeriodikAdminIndex');
Route::get('/home', 'AdminController@index')->name('admin.home');

Route::get('/nilai-periodik-admin-index', 'NilaiPeriodikControllerAdmin@index')->name('nilaiPeriodikAdminIndex');
Route::get('/nilai-periodik-admin-show/{id}', 'NilaiPeriodikControllerAdmin@show')->name('nilaiPeriodikAdminShow');
Route::get('/nilai-periodik-admin-edit/{id}', 'NilaiPeriodikControllerAdmin@edit')->name('nilaiPeriodikAdminEdit');
Route::put('/nilai-periodik-admin-update/{id}', 'NilaiPeriodikControllerAdmin@update')->name('nilaiPeriodikControllerAdminUpdate');

Route::get('dpns1/{id}', 'DpnsControllerAdmin@dpns1')->name('dpns1Koordinator');

Route::get('dpns1Home', 'DpnsControllerAdmin@dpns1Home')->name('dpns1HomeKoordinator');
Route::get('dpns1Detail/{id}', 'DpnsControllerAdmin@dpns1Detail')->name('dpns1DetailKoordinator');
Route::get('detailNPDpns1/{id}', 'DpnsControllerAdmin@detailNPDpns1')->name('detailNPDpns1');
Route::get('dpns2Home', 'DpnsControllerAdmin@dpns2Home')->name('dpns2HomeKoordinator');
Route::get('dpns2Detail/{id}', 'DpnsControllerAdmin@dpns2Detail')->name('dpns2DetailKoordinator');
Route::get('detailNPDpns2/{id}', 'DpnsControllerAdmin@detailNPDpns2')->name('detailNPDpns2');
Route::get('dpns3Home', 'DpnsControllerAdmin@dpns3Home')->name('dpns3HomeKoordinator');
Route::get('dpns3Detail/{id}', 'DpnsControllerAdmin@dpns3Detail')->name('dpns3DetailKoordinator');
Route::get('detailNPDpns3/{id}', 'DpnsControllerAdmin@detailNPDpns3')->name('detailNPDpns3');
Route::get('dpnaHome', 'DpnsControllerAdmin@dpnaHome')->name('dpnaHomeKoordinator');
Route::get('dpnaDetail/{id}', 'DpnsControllerAdmin@dpnaDetail')->name('dpnaDetailKoordinator');
Route::get('detailNPDpna/{id}', 'DpnsControllerAdmin@detailNPDpna')->name('detailNPDpna');

Route::get('pengaduanListKoordinator', 'PengaduanControllerAdmin@index')->name('pengaduanListKoordinator');
Route::get('pesan-personal-mahasiswa/{user_id}', 'PengaduanControllerAdmin@pesanPersonalVsKoor')->name('pesanPersonalVsKoor');
Route::get('pesanVsKoor/{id}', 'PengaduanControllerAdmin@pesanVsKoor')->name('pesanVsKoor');
Route::post('pengaduan-send-koor', 'PengaduanControllerAdmin@store')->name('pengaduanSendKoor');
Route::post('balas-pesan/{id}', 'PengaduanControllerAdmin@update')->name('balasPesan');

Route::get('daftar-semua-mahasiswa', 'AdminController@daftarAllMhs')->name('daftarAllMhs');
Route::get('list-keluarga', 'AdminController@listKeluarga')->name('listKeluarga');
Route::get('daftar-mahasiswa-berdasarkan-keluarga/{id}', 'AdminController@daftarMhsVsKeluarga')->name('daftarMhsVsKeluarga');
Route::get('detail-mahasiswa/{id}', 'AdminController@detailMhs')->name('detailMhs');
Route::get('edit-detail-mahasiswa/{id}', 'AdminController@editDetailMhs')->name('editDetailMhs');
Route::post('update-detail-mahasiswa/{id}', 'AdminController@updateMhs')->name('updateMhs');
// end Koordinator

// Route::get('pesan-personal-mhs/{user_id}', 'MahasiswaController@pesanPersonalVsMhs')->name('pesanPersonalVsMhs');






