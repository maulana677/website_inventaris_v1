<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryIndex extends Component
{
    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('status', 'Data Berhasil Dihapus');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.category.category-index', [
            'categories' => Category::all()
        ]);
    }
}
