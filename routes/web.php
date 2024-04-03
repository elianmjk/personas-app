<?php

use App\Http\Controllers\comunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/comunas',[comunaController::class,'index'])->name('comunas.index');
Route::post('/comunas',[comunaController::class,'store'])->name('comunas.store');
Route::get('/comunas/create',[comunaController::class,'create'])->name('comunas.create');
Route::delete('/comunas/{comuna}',[comunaController::class,'destroy'])->name('comunas.destroy');
