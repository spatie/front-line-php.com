<?php

use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use App\Http\Front\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', HomeController::class);
Route::get('/videos/{slug}', VideosController::class);

Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');

Route::view('cheat-sheet', 'front.cheat-sheet.index')->name('cheat-sheet');
Route::view('object-oriented', 'front.preview.object-oriented')->name('object-oriented');
Route::view('dealing-with-null', 'front.preview.dealing-with-null')->name('dealing-with-null');
