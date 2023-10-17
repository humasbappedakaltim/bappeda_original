<?php

use Illuminate\Support\Facades\Route;

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
//     return view('portal-new');
// });
Route::get('/', 'Homepage\HomeController@headerbaru')->name('home'); //headerbaru

Route::get('/beranda', 'Homepage\HomeController@headerbaru')->name('home'); //headerbaru
Route::get('/headerbaru', 'Homepage\HomeController@index')->name('headerbaru'); //headerlama
// Route::get('/headerbaru','Homepage\HomeController@headerbaru')->name('headerbaru');
Route::get('/kliktanggal/{slug}', 'Homepage\HomeController@kliktanggal')->name('kliktanggal.get');
Route::get('/klikevent/{slug}', 'Homepage\HomeController@klikevent')->name('klikevent.get');
Route::get('/agendaprevnext/{slug}', 'Homepage\HomeController@agendaprevnext')->name('agendaprevnext.get');
Route::get('/allagenda', 'Homepage\HomeController@allagenda')->name('allagenda.get');
Route::get('/agenda', 'Homepage\EventController@index')->name('event.index');
Route::get('/agenda/{bidang}', 'Homepage\EventController@agendabidang')->name('agendabidang.get');
Route::get('/agenda/ruangrapat/{namaruang}', 'Homepage\EventController@agendaruangrapat')->name('agendaruangrapat.get');
Route::get('/berita-foto', 'Homepage\PostController@beritaFoto')->name('post_foto.index');
Route::get('/berita-foto/{slug}', 'Homepage\PostController@detailBeritaFoto')->name('post_foto.detail');
Route::get('/agenda/detail/{slug}', 'Homepage\EventController@detailEvent')->name('event.detail');
Route::get('/page/{slug}', 'Homepage\PageController@detailPage')->name('page.detail');
Route::get('/ppid/{slug}', 'Homepage\PageController@detailPagePpid')->name('page.ppiddetail');
Route::get('/postingan', 'Homepage\PostController@index')->name('post.index');
Route::get('/search/post', 'Homepage\PostController@searchPost')->name('search_post');
Route::get('/search/event', 'Homepage\EventController@searchEvent')->name('search_event');
Route::get('/postingan/arsip/{month}/{year}', 'Homepage\PostController@filterByMonth')->name('post.filterMonth');
Route::get('/postingan/{slug}', 'Homepage\PostController@detailPost')->name('post.detail');
Route::get('/postingan/category/{slug_category}', 'Homepage\PostController@detailCategory')->name('post.category');
Route::get('/galeri', 'Homepage\GalleryController@index')->name('gallery.index');
Route::get('/galeri/detail/{slug}', 'Homepage\GallyerController@detailGallery')->name('gallery.detail');
Route::get('/video', 'Homepage\VideoController@index')->name('video.index');
Route::get('/library', 'Homepage\LibraryController@index')->name('library.index');
Route::get('/dokumen/{slug}', 'Homepage\DocumentController@detailDocument')->name('document.detail');
Route::get('/penghargaan', 'Homepage\PenghargaanController@index')->name('penghargaan.index');
Route::get('/peta', 'Homepage\MapController@index')->name('map.index');
Route::get('/peta/{slug}', 'Homepage\MapController@detail')->name('map.detail');
Route::get('/asn-bappeda-prov-kaltim', 'Homepage\PegawaiBappedaController@pegawaiasn')->name('pegawaiasn.index');
Route::get('/sosialmedia', 'Homepage\SocialController@index')->name('sosialmedia');
Route::get('/data-center/data-perencanaan', 'Homepage\DataPerencanaanController@index')->name('dataperencanaan.index');
Route::get('/data-center/data-pengendalian-dan-evaluasi', 'Homepage\DataPengendalianEvaluasiController@index')->name('datapengendalianevaluasi.index');
Route::get('/data-center/kumpulan-paparan', 'Homepage\KumpulanPaparanController@index')->name('kumpulanpaparan.index');
Route::get('/data-center/kumpulan-paparan/{slug}', 'Homepage\KumpulanPaparanController@slug_link')->name('kumpulanpaparan.slug_link');
Route::get('/ruang-publik', 'Homepage\RuangPublikController@index')->name('ruangpublik.index');
Route::get('/data-center/data-lainnya', 'Homepage\DataLainnyaController@index')->name('datalainnya.index');
Route::get('/ppid', 'Homepage\PpidController@index')->name('ppid.index');
Route::get('/dasar-hukum-ppid', 'Homepage\PpidController@postppidDasarHukum')->name('ppid.dasarhukum');
Route::get('/dasar-hukum-ppid/{slug}', 'Homepage\PpidController@postppidDetail')->name('ppid.dasarhukumDetail');
Route::get('/sop-ppid', 'Homepage\PpidController@postppidSop')->name('ppid.sopppid');
Route::get('/sop-ppid/{slug}', 'Homepage\PpidController@postppidDetail')->name('ppid.sopppidDetail');
Route::get('/ppid/info-publik/{slug}', 'Homepage\PpidController@PpidDataCenter')->name('ppid.infopublik');
Route::get('/ppid/laporan/{slug}', 'Homepage\PpidController@PpidDataCenter')->name('ppid.laporan');
Route::get('/ppid/standar-layanan/{slug}', 'Homepage\PpidController@PpidDataCenter')->name('ppid.standarlayanan');
Route::post('/inputdatasurvei', 'Homepage\HomeController@ProsesInputDataSurvei')->name('inputdatasurvei');
Route::get('/testinputdatasurvei', 'Homepage\HomeController@testinputdatasurvei')->name('test.inputdatasurvei');
Route::get('/aplikasibappeda', 'Homepage\PpidController@aplikasibappeda')->name('aplikasibappeda');
// ajax select option bidang dan sub bidang
Route::get('/ajaxoptionsubbidang/{id_bidang}', 'HomeController@ajaxoptionsubbidang')->name('ajaxoptionsubbidang');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
