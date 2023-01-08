<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycon;


Route::get('/', [Mycon::class, 'login']);
Route::post('/login', [Mycon::class, 'login_p']);
Route::get('/logout', [Mycon::class, 'logout'])->middleware('login');
Route::post('/create', [Mycon::class, 'create_p'])->middleware('login','role');
Route::get('/create', [Mycon::class, 'create'])->middleware('login','role');
Route::get('/family', [Mycon::class, 'family'])->middleware('login','role');
Route::post('/family', [Mycon::class, 'family_p'])->middleware('login','role');
Route::get('/education', [Mycon::class, 'education'])->middleware('login','role');
Route::post('/education', [Mycon::class, 'education_p'])->middleware('login','role');
Route::get('/experience', [Mycon::class, 'experience'])->middleware('login','role');
Route::post('/experience', [Mycon::class, 'experience_p'])->middleware('login','role');
Route::get('/delete', [Mycon::class, 'delete'])->middleware('login','role');
Route::post('/delete', [Mycon::class, 'delete_p'])->middleware('login','role');

Route::get('/a_update', [Mycon::class, 'a_update'])->middleware('login','role');
Route::post('/a_update', [Mycon::class, 'a_update_g_p'])->middleware('login','role');
Route::post('/a_o_update', [Mycon::class, 'a_o_update'])->middleware('login','role');

Route::get('/s_update', [Mycon::class, 's_update'])->middleware('login');
Route::post('/s_update', [Mycon::class, 's_update_p'])->middleware('login');

Route::get('/view', [Mycon::class, 'view'])->middleware('login');

Route::get('/goto_view', [Mycon::class, 'goto_view'])->middleware('login','role');
Route::get('/all_view/{id}', [Mycon::class, 'all_view'])->middleware('login','role');



Route::get('/pdf/{id}', [Mycon::class, 'pdf'])->middleware('login','role');
Route::get('/all_pdf', [Mycon::class, 'all_pdf'])->middleware('login','role');
Route::get('/error', [Mycon::class, 'error']);


Route::get('/excel_export', [Mycon::class, 'excel_export'])->middleware('login','role');
Route::get('/excel_import', [Mycon::class, 'excel_import'])->middleware('login','role');
Route::post('/excel_import', [Mycon::class, 'excel_import_p'])->middleware('login','role');
