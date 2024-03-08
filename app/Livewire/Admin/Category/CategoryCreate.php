<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryCreate extends Component
{
    #[Validate('required', message: 'Nama kategori harus diisi')]
    public $name;

    #[Validate('required', message: 'Deskripsi harus diisi')]
    public $description;

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('status', 'Data Berhasil Ditambahkan');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    #[Layout('layouts.admin', ['title' => 'Category Create'])]
    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
