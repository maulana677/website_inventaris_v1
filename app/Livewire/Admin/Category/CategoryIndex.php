<?php

namespace App\Livewire\Admin\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryIndex extends Component
{
    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.category.category-index');
    }
}
