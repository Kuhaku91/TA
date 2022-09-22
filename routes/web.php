<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BatasPointController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AkunController as AkunAdmin;
use App\Http\Controllers\Admin\PointController as PointAdmin;
use App\Http\Controllers\Admin\KelasController as KelasAdmin;
use App\Http\Controllers\Admin\GambarController as GambarAdmin;

use App\Http\Controllers\BkController;
use App\Http\Controllers\Bk\AkunController as AkunBk;
use App\Http\Controllers\Bk\KonselingController as KonselingBk;
use App\Http\Controllers\Bk\PointController as PointBk;
use App\Http\Controllers\Bk\SpController as SPBk;
use App\Http\Controllers\Bk\RekapController as RekapSiswa;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\Guru\AkunController as AkunGuru;
use App\Http\Controllers\Guru\PointController as PointGuru;
use App\Http\Controllers\Guru\SpController as SPGuru;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Siswa\AkunController as AkunSiswa;
use App\Http\Controllers\Siswa\PointController as PointSiswa;
use App\Http\Controllers\Siswa\KonselingController as KonselingSiswa;

use App\Http\Controllers\WaliController;
use App\Http\Controllers\Wali\AkunController as AkunWali;
use App\Http\Controllers\Wali\PointController as PointWali;
use App\Http\Controllers\Wali\SpController as SPWali;

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

// Route::get('/', function () {
//     return view('welcome2');
// });

Route::get('getkelas',[KelasController::class,'Kelas']);
Route::get('getsiswa',[KelasController::class,'Siswa']);
Route::get('getwali',[KelasController::class,'Wali']);

Route::get('/',[DashboardController::class,'Dashboard'])->name('Dashboard');

Route::post('login',[AuthController::class,'Login'])->name('login');
Route::get('logout',[AuthController::class,'Logout'])->name('logout');

Route::middleware('checkRole:admin')->group(function(){
	Route::get('admin',[AdminController::class,'Admin'])->name('Admin');
	Route::post('admin',[AdminController::class,'TAdmin'])->name('TAdmin');

	Route::get('admin/akun',[AkunAdmin::class,'Akun'])->name('AdminAkun');
	Route::get('admin/akun/bk',[AkunAdmin::class,'AkunBk'])->name('AdminAkunBk');
	Route::get('admin/akun/guru',[AkunAdmin::class,'AkunGuru'])->name('AdminAkunGuru');
	Route::get('admin/akun/siswa',[AkunAdmin::class,'AkunSiswa'])->name('AdminAkunSiswa');
	Route::get('admin/akun/wali',[AkunAdmin::class,'AkunWali'])->name('AdminAkunWali');
	
	Route::post('admin/akun',[AkunAdmin::class,'TAkun'])->name('TAkun');
	Route::post('admin/akun/ubah/{id}',[AkunAdmin::class,'UAkun'])->name('AdminUAkun');
	Route::post('admin/akun/hapus/{id}',[AkunAdmin::class,'HAkun'])->name('AdminHAkun');

	Route::get('admin/point',[PointAdmin::class,'Point'])->name('AdminPoint');
	Route::post('admin/point',[PointAdmin::class,'TPoint'])->name('AdminTPoint');
	Route::post('admin/point/ubah/{id}',[PointAdmin::class,'UPoint'])->name('AdminUPoint');
	Route::post('admin/point/hapus/{id}',[PointAdmin::class,'HPoint'])->name('AdminHPoint');

	Route::get('admin/kelas',[KelasAdmin::class,'Kelas'])->name('AdminKelas');
	Route::post('admin/kelas',[KelasAdmin::class,'TKelas'])->name('AdminTKelas');
	Route::post('admin/kelas/ubah/{id}',[KelasAdmin::class,'UKelas'])->name('AdminUKelas');
	Route::post('admin/kelas/hapus/{id}',[KelasAdmin::class,'HKelas'])->name('AdminHKelas');

	Route::get('admin/gambar',[GambarAdmin::class,'Gambar'])->name('AdminGambar');
	Route::post('admin/gambar',[GambarAdmin::class,'TGambar']);

	Route::get('admin/batas',[BatasPointController::class,'AdminBatas'])->name('AdminBatas');
	Route::post('admin/batas',[BatasPointController::class,'PAdminBatas'])->name('PAdminBatas');
	Route::post('admin/batas/ubah/{id}',[BatasPointController::class,'UAdminBatas'])->name('UAdminBatas');
	Route::post('admin/batas/delete/{id}',[BatasPointController::class,'HAdminBatas'])->name('HAdminBatas');
});

Route::middleware('checkRole:bk')->group(function(){
	Route::get('bk',[BkController::class,'Bk'])->name('Bk');
	Route::post('bk',[AkunBk::class,'TBk'])->name('TBk');

	Route::get('bk/lapor',[PointBk::class,'Point'])->name('BkPoint');
	Route::get('bk/lapor/verif/{id}',[PointBk::class,'VPoint']);
	Route::get('bk/lapor/tolak/{id}',[PointBk::class,'TPoint']);
	
	Route::get('bk/lapor/{id}',[PointBk::class,'CPoint']);
	Route::post('bk/lapor/siswa/{id}',[PointBk::class,'TCPointSiswa']);
	Route::post('bk/lapor/wali/{id}',[PointBk::class,'TCPointWali']);

	Route::get('bk/plapor/{id}',[PointBk::class,'CPPoint']);
	Route::post('bk/plapor/{id}',[PointBk::class,'TCPPoint']);

	Route::get('bk/konseling',[KonselingBk::class,'Konseling'])->name('BkKonseling');
	Route::get('bk/konseling/verif/{id}',[KonselingBk::class,'VKonseling']);
	Route::get('bk/konseling/tolak/{id}',[KonselingBk::class,'TKonseling']);
	Route::get('bk/konseling/{id}',[KonselingBk::class,'CKonseling']);
	Route::post('bk/konseling/{id}',[KonselingBk::class,'TCKonseling']);

	Route::get('bk/sp',[SPBk::class,'BKSP'])->name('BkSP');
	Route::post('bk/sp',[SPBk::class,'TBKSP']);

	Route::get('rekapsiswa',[RekapSiswa::class,'Rekap'])->name('RekapSiswa');
	Route::get('drekapsiswa/{id}',[RekapSiswa::class,'DRekap'])->name('DRekapSiswa');
	Route::get('crekapsiswa/{id}',[RekapSiswa::class,'cRekap'])->name('cRekapSiswa');
	
	Route::get('datasiswa',[RekapSiswa::class,'Data'])->name('DataSiswa');
	Route::get('get_datasiswa',[RekapSiswa::class,'Get_Data'])->name('Get_DataSiswa');

	Route::get('bk/batas',[BatasPointController::class,'BkBatas'])->name('BkBatas');
	Route::post('bk/batas',[BatasPointController::class,'PBkBatas'])->name('PBkBatas');
	Route::post('bk/batas/ubah/{id}',[BatasPointController::class,'UBkBatas'])->name('UBkBatas');
});

Route::middleware('checkRole:guru')->group(function(){
	Route::get('guru',[GuruController::class,'Guru'])->name('Guru');
	Route::post('guru',[AkunGuru::class,'UGuru'])->name('UGuru');

	Route::get('guru/lapor/siswa',[PointGuru::class,'Point'])->name('GuruPointSiswa');
	Route::get('guru/lapor/guru',[PointGuru::class,'PointGuru'])->name('GuruPointGuru');
	Route::post('guru/lapor',[PointGuru::class,'TPoint'])->name('GuruTPoint');
	
	Route::get('guru/lapor/',[PointGuru::class,'PPoint'])->name('GuruPointLapor');
	Route::get('guru/plapor/{id}',[PointGuru::class,'CPLapor']);
	Route::post('guru/plapor/{id}',[PointGuru::class,'TCPLapor']);

	Route::get('guru/point',[PointGuru::class,'DPoint'])->name('DataGuruPoint');
	Route::get('guru/point/{id}',[PointGuru::class,'CDPoint']);

	Route::get('guru/point/{id}',[PointGuru::class,'CDPoint']);
	Route::post('guru/point/{id}',[PointGuru::class,'TCDPoint']);

	Route::get('guru/sp',[SPGuru::class,'GURUSP'])->name('GuruSP');
	Route::post('guru/psp',[SPGuru::class,'PGURUSP']);
});

Route::middleware('checkRole:siswa')->group(function(){
	Route::get('siswa',[SiswaController::class,'Siswa'])->name('Siswa');
	Route::post('siswa/ubah/{id}',[AkunSiswa::class,'UAkun'])->name('SiswaUAkun');
	
	Route::get('siswa/lapor/siswa',[PointSiswa::class,'Point'])->name('SiswaPointSiswa');
	Route::get('siswa/lapor/guru',[PointSiswa::class,'PointGuru'])->name('SiswaPointGuru');
	Route::post('siswa/lapor',[PointSiswa::class,'TPoint'])->name('SiswaTPoint');
	
	Route::get('siswa/lapor/',[PointSiswa::class,'PPoint'])->name('SiswaPointLapor');
	Route::get('siswa/plapor/{id}',[PointSiswa::class,'CPLapor']);
	Route::post('siswa/plapor/{id}',[PointSiswa::class,'TCPLapor']);

	Route::get('siswa/point',[PointSiswa::class,'DPoint'])->name('DataSiswaPoint');
	Route::get('siswa/point/{id}',[PointSiswa::class,'CDPoint']);
	Route::post('siswa/point/{id}',[PointSiswa::class,'TCDPoint']);

	Route::get('siswa/konseling',[KonselingSiswa::class,'Konseling'])->name('SiswaKonseling');
	Route::post('siswa/konseling',[KonselingSiswa::class,'TKonseling'])->name('SiswaTKonseling');
	Route::get('siswa/konseling/{id}',[KonselingSiswa::class,'CKonseling']);
	Route::post('siswa/konseling/{id}',[KonselingSiswa::class,'TCKonseling']);
});

Route::middleware('checkRole:wali')->group(function(){
	Route::get('wali',[WaliController::class,'Wali'])->name('Wali');
	Route::post('wali',[AkunWali::class,'TWali'])->name('TWali');

	Route::get('wali/point',[PointWali::class,'DPoint'])->name('DataWaliPoint');
	Route::get('wali/point/{id}',[PointWali::class,'CDPoint']);
	Route::post('wali/point/{id}',[PointWali::class,'TCDPoint']);

	Route::get('wali/sp',[SPWali::class,'WALISP'])->name('WaliSP');
	Route::post('wali/psp',[SPWali::class,'PWALISP']);
});