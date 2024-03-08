<?php

namespace App\Livewire\Staff\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TransactionCreate extends Component
{
    public $products, $date, $product_id, $price, $total, $notes;
    public $max_stock = 1;
    public $quantity = 1;

    public function mount()
    {
        $this->products = Product::where('stock', '>', 0)->get();
    }

    public function updatedProductId()
    {
        $product = Product::find($this->product_id);
        $this->max_stock = $product->stock;
        $this->price = 'Rp. ' . number_format($product->selling_price);
        $this->total = 'Rp. ' . number_format($product->selling_price);
    }

    public function updatedQuantity()
    {
        $product = Product::find($this->product_id);
        $this->total = 'Rp. ' . number_format((int)$product->selling_price * (int)$this->quantity);
    }

    public function save()
    {
        $product = Product::find($this->product_id);

        Transaction::create([
            'product_id' => $this->product_id,
            'user_id' => Auth::user()->id,
            'date' => $this->date,
            'quantity' => $this->quantity,
            'price' => $product->selling_price,
            'total' => $product->selling_price * $this->quantity,
            'notes' => $this->notes
        ]);

        $product->update(['stock' => $product->stock - $this->quantity]);

        session()->flash('status', 'Transaksi Baru Berhasil Dibuat');
        return $this->redirectRoute('staff.transaksi', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.staff.transaction.transaction-create');
    }
}
