<?php

use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    Route::get('kategori', CategoryIndex::class)->name('admin.kategori');
    Route::get('kategori/create', CategoryCreate::class)->name('admin.kategori.create');
    Route::get('kategori/edit/{id}', CategoryEdit::class)->name('admin.kategori.edit');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
