<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/agendabappeda', function(){
 return 'ts';
});

Route::get('/resume', [Api\HomeResumeController::class, 'index']);
Route::get('/agenda', [Api\AgendaController::class, 'index']);
Route::get('/pages', [Api\PagesController::class, 'index']);
Route::get('/post', [Api\NewsController::class, 'index']);
Route::get('/post/{id}', [Api\NewsController::class, 'detail']);
Route::get('/data-center/perencanaan', [Api\DataCenterController::class, 'perencanaan']);
Route::get('/data-center/pengendalian', [Api\DataCenterController::class, 'pengendalian']);
Route::get('/data-center/paparan', [Api\DataCenterController::class, 'paparan']);
Route::get('/data-center/lainnya', [Api\DataCenterController::class, 'lainnya']);
Route::get('/setting/social-media', [Api\SettingController::class, 'socialMedia']);
Route::get('/bappeda/profile', [Api\SettingController::class, 'profile']);
Route::get('/pejabat', [Api\PejabatController::class, 'index']);
Route::get('/ppid/profile', [Api\SettingController::class, 'profilePPID']);
Route::get('/applications', [Api\ApplicationController::class, 'index']);

Route::get('/ppid/data-center/', [Api\PpidDataCenterController::class, 'index']);