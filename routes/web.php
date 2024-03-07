<?php

use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\ProductCreate;
use App\Livewire\Admin\Product\ProductEdit;
use App\Livewire\Admin\Product\ProductIndex;
use App\Livewire\Admin\Staff\StaffCreate;
use App\Livewire\Admin\Staff\StaffEdit;
use App\Livewire\Admin\Staff\StaffIndex;
use App\Livewire\Admin\Transaction\TransactionCreate;
use App\Livewire\Admin\Transaction\TransactionIndex;
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
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    /** Category Route */
    Route::get('kategori', CategoryIndex::class)->name('admin.kategori');
    Route::get('kategori/create', CategoryCreate::class)->name('admin.kategori.create');
    Route::get('kategori/edit/{id}', CategoryEdit::class)->name('admin.kategori.edit');

    /** Product Route */
    Route::get('produk', ProductIndex::class)->name('admin.produk');
    Route::get('produk/create', ProductCreate::class)->name('admin.produk.create');
    Route::get('produk/edit/{id}', ProductEdit::class)->name('admin.produk.edit');

    /** Staff Route */
    Route::get('staff', StaffIndex::class)->name('admin.staff');
    Route::get('staff/create', StaffCreate::class)->name('admin.staff.create');
    Route::get('staff/edit/{id}', StaffEdit::class)->name('admin.staff.edit');

    /** Transaction Route */
    Route::get('transaksi', TransactionIndex::class)->name('admin.transaksi');
    Route::get('transaksi/create', TransactionCreate::class)->name('admin.transaksi.create');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
