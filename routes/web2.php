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

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
})->name('welcome');
// Route::get('/login..', function () {
//     // return view('welcome');
//     return view('login');
// })->name('login..');
// Route::get('/login2..', function () {
//     // return view('welcome');
//     return view('login2');
// })->name('login2..');
// Route::get('/login3', function () {
//     // return view('welcome');
//     return view('login3');
// })->name('login3');
// Route::get('/login4', function () {
//     // return view('welcome');
//     return view('login4');
// })->name('login4');

// Route::get('/loginSekretaris', function () {
//     // return view('welcome');
//     return view('login.loginSekretaris');
// })->name('loginSekretaris');

// Route::get('/loginTutor', function () {
//     // return view('welcome');
//     return view('login.loginTutor');
// })->name('loginTutor');

// Route::get('/loginMahasiswa', function () {
//     // return view('welcome');
//     return view('login.loginMahasiswa');
// })->name('loginMahasiswa');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'DpnaController@index')->name('beranda');
// Route::resource('/nilaiperiodik', 'NilaiPeriodikController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/', 'SekretarisNilaiPeriodikController@index')->name('sekretaris.home');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});

Route::group(['prefix' => 'sekretaris'], function () {
    Route::get('/login', 'AuthSekretaris\LoginController@showLoginForm')->name('sekretaris.login');
    Route::post('/login', 'AuthSekretaris\LoginController@login')->name('sekretaris.login.submit');
    Route::get('/', 'SekretarisNilaiPeriodikController@index')->name('sekretaris.home');
    Route::get('/', 'SekretarisNilaiPeriodikController@index')->name('sekretaris.home');
});

Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/login', 'AuthMahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login', 'AuthMahasiswa\LoginController@login')->name('mahasiswa.login.submit');
    Route::get('/register', 'MahasiswaController@register')->name('mahasiswa.register');
    Route::get('/index', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::get('/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::post('/store', 'MahasiswaController@store')->name('mahasiswa.store');
    Route::get('/home', 'MahasiswaController@index')->name('mahasiswa.home');
});

// Route::get('/mahasiswa/home', 'MahasiswaController@index')->name('mahasiswa.home');
// Route::get('/home', 'MahasiswaController@index')->name('home');

// Route::resource('mahasiswaa', 'MahasiswaController');

// Route::group(['prefix' => 'AnggotaKeluarga'], function () {
//     Route::get('/apiNP', 'AnggotaKeluargaController@apiAnggotaKeluarga')->name('apiAnggotaKeluarga');
//     Route::get('/index', 'AnggotaKeluargaController@index')->name('anggotaKeluarga');
//     Route::get('/create', 'AnggotaKeluargaController@create')->name('createAnggotaKeluarga');
//     Route::get('/show', 'AnggotaKeluargaController@show')->name('showAnggotaKeluarga');
//     Route::get('/edit/{id}', 'AnggotaKeluargaController@edit')->name('editAnggotaKeluarga');
//     Route::get('/', 'AnggotaKeluargaController@index')->name('anggotaKeluarga.home');
//     Route::post('/store', 'AnggotaKeluargaController@store')->name('anggotaKeluarga.store');
// });

Route::group(['prefix' => 'nilaiPeriodik'], function () {
    Route::get('/apiNP', 'NilaiPeriodikController@apiNilaiPeriodik')->name('apiNilaiPeriodik');
    Route::get('/index', 'NilaiPeriodikController@index')->name('nilaiPeriodik.index');
    Route::get('/create', 'NilaiPeriodikController@create')->name('nilaiPeriodik.create');
    Route::get('/show', 'NilaiPeriodikController@show')->name('showNilaiPeriodik');
    Route::get('/edit/{id}', 'NilaiPeriodikController@edit')->name('nilaiPeriodik.edit');
    Route::get('/', 'NilaiPeriodikController@index')->name('nilaiPeriodik.home');
    Route::post('/store', 'NilaiPeriodikController@store')->name('nilaiPeriodik.store');
    Route::post('/update', 'NilaiPeriodikController@update')->name('nilaiPeriodik.update');
    Route::post('/destroy', 'NilaiPeriodikController@destroy')->name('nilaiPeriodik.destroy');
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
Route::get('dpns1', 'MahasiswaController@dpns1')->name('dpns11');

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
Route::get('/dpna', 'MahasiswaController@dpna')->name('dpnaa');

// Route::group(['prefix' => 'pengaduan'], function () {
//     Route::get('/apiNP', 'PengaduanController@apiDpns1')->name('apiPengaduan');
//     Route::get('/index', 'PengaduanController@index')->name('pengaduan');
//     Route::get('/create', 'PengaduanController@create')->name('createPengaduan');
//     Route::get('/show', 'PengaduanController@show')->name('showPengaduan');
//     Route::get('/edit', 'PengaduanController@edit')->name('editPengaduan');
//     Route::get('/', 'PengaduanController@index')->name('dpna.home');
// });
Route::get('/pengaduan', 'MahasiswaController@pengaduan')->name('pengaduan');

Route::get('/keluarga', 'MahasiswaController@keluarga')->name('keluarga');
Route::get('/tambahKeluarga', 'MahasiswaController@tambahKeluarga')->name('tambahKeluarga');

Route::group(['prefix' => 'dpns'], function () {
    Route::get('/dpns1', 'DPNS1Controller@index')->name('dpns1');
    Route::get('/dpns1view', 'DPNS1Controller@show')->name('dpns1.show');
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
// Route::post('/tambahMahasiswa', 'MahasiswaController@tambahMahasiswa')->name('tambahMahasiswa');


Route::get('/koordinators', 'AdminController@index')->name('koordinator.index');
Route::get('/koordinator', 'AdminController@haha')->name('admin.home');

// Route::get('/mahasiswaaa', 'MahasiswaController@index')->name('mahasiswaaa')->middleware('role');
// Route::get('/mahasiswaaa', 'MahasiswaController@index')->name('sekretaris.index');
// Route::get('/mahasiswasss', function () {
//     // return view('sekretaris.index');
//     return "sssss";
//     // })->middleware(['auth', 'role'])->name('sekretaris.index');
// })->middleware(['auth', 'role'])->name('sekretaris.index');

Route::get('/sekretaris', function () {
    return view('adminSekretaris.mahasiswa.index');
    // return 'sekretaris';
})->middleware(['auth', 'role'])->name('sekretaris.index');

Route::get('/tutor', function () {
    return view('adminSekretaris.mahasiswa.index');
    // return 'tutor';
})->name('tutor');

Route::get('/mahasiswa', function () {
    return view('adminSekretaris.mahasiswa.index');
    // return 'mahasiswa';
})->middleware(['auth'])->name('mahasiswa');

Route::get('/koordinator', function () {
    return view('koordinator.index');
    // return 'koordinator';
})->middleware(['role', 'auth'])->name('koordinator.index');


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
    $post->name = 'admins';
    $post->email = 'admins@gmail.com';
    $post->foto = 'admins@gmail.com';
    $post->password = bcrypt('aaaaaaaa');
    $post->save();
});
