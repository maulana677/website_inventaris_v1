<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        $product_total = Product::count();
        $product_almost_out_stock = Product::where('stock', '<', 10)->count();
        $product_out_stock = Product::where('stock', 0)->count();
        $user_total = User::count();
        return view('livewire.admin.dashboard', compact('product_total', 'product_almost_out_stock', 'product_out_stock', 'user_total'));
    }
}
