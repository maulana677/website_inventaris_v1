<?php

namespace App\Livewire\Admin\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TransactionIndex extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.transaction.transaction-index', [
            'transactions' => Transaction::orderBy('id', 'desc')->get()
        ]);
    }
}
