<?php

namespace App\Livewire\Admin\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TransactionIndex extends Component
{
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $product = Product::find($transaction->product_id);
        $product->update([
            'stock' => $product->stock + $transaction->quantity
        ]);

        $transaction->delete($id);
        session()->flash('status', 'Transaksi Berhasil Dibatalkan');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.transaction.transaction-index', [
            'transactions' => Transaction::orderBy('id', 'desc')->get()
        ]);
    }
}
