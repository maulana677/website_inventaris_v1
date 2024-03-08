<?php

namespace App\Livewire\Staff;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin', ['title' => 'Dashboard Staff'])]
    public function render()
    {
        $product_total = Product::count();
        $product_almost_out_stock = Product::where('stock', '<', 10)->count();
        $product_out_stock = Product::where('stock', 0)->count();
        $product_sold = Transaction::whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('quantity');
        $income = Transaction::whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('total');

        return view('livewire.staff.dashboard', compact(
            'product_total',
            'product_almost_out_stock',
            'product_out_stock',
            'product_sold',
            'income',
            'income'
        ));
    }
}
