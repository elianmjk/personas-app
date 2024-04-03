<?php

use App\Http\Controllers\comunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/comunas',[comunaController::class,'index'])->name('comunas.index');
Route::post('/comunas',[comunaController::class,'store'])->name('comunas.store');