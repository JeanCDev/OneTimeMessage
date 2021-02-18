<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

Route::get('/', [Main::class, 'index'])->name('home');

// inicia o processo do envio da mensagem
Route::post('/init', [Main::class, 'init'])->name('init');

// Confirmação do envio da mensagem
Route::get('/confirm/{purl}', [Main::class, 'confirm'])->name('confirm');

// Leitura da mensagem
Route::get('/read/{purl}', [Main::class, 'read'])->name('read'); 
