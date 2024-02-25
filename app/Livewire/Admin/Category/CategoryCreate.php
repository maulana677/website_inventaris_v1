<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryCreate extends Component
{

    public $name;
    public $description;

    public function save()
    {
        Category::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('status', 'Data Berhasil Ditambahkan');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
