<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin', ['title' => 'Dashboard'])]
    public function render()
    {
        $product_total = Product::count();
        $product_almost_out_stock = Product::where('stock', '<', 10)->count();
        $product_out_stock = Product::where('stock', 0)->count();
        $user_total = User::count();
        $product_sold = Transaction::whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('quantity');
        $income = Transaction::whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('total');

        return view('livewire.admin.dashboard', compact(
            'product_total',
            'product_almost_out_stock',
            'product_out_stock',
            'user_total',
            'product_sold',
            'income'
        ));
    }
}
