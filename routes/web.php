<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [MemberController::class, 'index']);
Route::get('/apa', [MemberController::class, 'apa']);
Route::get('/profil/desa', [MemberController::class, 'profildesa']);
Route::get('/profil/bumdes', [MemberController::class, 'profilbumdes']);
Route::get('/profil/info-bumdes', [MemberController::class, 'infobumdes']);
Route::post('/profil/simpan', [MemberController::class, 'updateprofildesa']);
Route::get('/join-desa', [MemberController::class, 'joindesa']);
Route::get('/unit-usaha', [MemberController::class, 'unit_usaha']);
Route::get('/edukasi', [MemberController::class, 'edukasi']);
Route::get('/member', [MemberController::class, 'manage_member']);
Route::get('/assesment', [MemberController::class, 'assesment']);

Route::get('/login', [MemberController::class, 'login']);
Route::get('/register', [MemberController::class, 'register']);

Route::get('google', [AuthController::class, 'redirect']);
Route::get('google/callback', [AuthController::class, 'callback']);
Route::post('/u-register', [AuthController::class, '_register']);
Route::get('/logout', [AuthController::class, 'logout']);

//RYZVIE
Route::post('/daftarUser', [AuthController::class, 'daftarUser']);
Route::post('/authLogin', [AuthController::class, 'authLogin']);
Route::get('/authRegisterWithEmail', [AuthController::class, 'authRegisterWithEmail']);
Route::post('/daftarUserByEmail', [AuthController::class, 'daftarUserByEmail']);


Route::post('/postJoinDesa', [MemberController::class, 'postJoinDesa']);
Route::get('/profil/akun', [MemberController::class, 'profilAkun']);
Route::get('/profil/verifikasiFinish', [MemberController::class, 'verifikasiFinish']);
Route::post('/profil/update', [MemberController::class, 'updateProfil']);
Route::post('/profil/updatebumdes', [MemberController::class, 'updateProfilBumdes']);
Route::get('/dashboard', [MemberController::class, 'dashboard']);
Route::get('/program/detail/{idprogram}', [MemberController::class, 'detailprogram']);
Route::get('/program/ikut/{idprogram}', [MemberController::class, 'ikutprogram']);
Route::get('/program/home/{idprogram}', [MemberController::class, 'homeprogram']);
Route::get('/program/syaratketentuan/{idprogram}', [MemberController::class, 'syaratketentuan']);
Route::get('/program/invitepeserta/{idprogram}', [MemberController::class, 'invitepeserta']);
Route::post('/program/tambahpeserta', [MemberController::class, 'tambahpeserta']);
Route::post('/program/simpanpeserta/{idprogram}', [MemberController::class, 'simpanpeserta']);
Route::get('/program/success/{idprogram}', [MemberController::class, 'success']);
Route::get('/program/form/{idprogram}', [MemberController::class, 'formkesediaan']);
Route::get('/program/lihatsemua', [MemberController::class, 'semuaprogram']);
Route::post('/profil/setOldVerifikasiEmail', [MemberController::class, 'setOldVerifikasiEmail']);

//HALAMAN ADMIN
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/authentication', [AdminController::class, 'authentication']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/admin/laporan/desa-terdaftar',[AdminController::class, 'lapdesaterdaftar']);
Route::get('/admin/laporan/desa-ikut-program',[AdminController::class, 'lapdesaikutprogram']);

Route::get('/admin/laporan/member-daftar',[AdminController::class, 'lapmemberdaftar']);
Route::get('/admin/laporan/member-program',[AdminController::class, 'lapmemberprogram']);
Route::get('/admin/laporan/member-desa',[AdminController::class, 'lapmemberdesa']);

//GET MASTER DATA
Route::post('/getMaster/kabupaten', [MasterController::class, 'kabupaten']);
Route::post('/getMaster/kecamatan', [MasterController::class, 'kecamatan']);
Route::post('/getMaster/desa', [MasterController::class, 'desa']);
Route::post('/getMaster/kodebumdes', [MasterController::class, 'kodebumdes']);





Route::get('/insert', function () {
    
    $stuRef = app('firebase.firestore')->database()->collection('Users')->Document("ba");
    $stuRef->set([
        'firstname' => 'Nanda',
        'lastname' => 'Fathurrizki',
        'phone' => 82284710743
    ]);


});