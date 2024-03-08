<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryEdit extends Component
{
    #[Validate('required', message: 'Nama kategori harus diisi')]
    public $name;

    #[Validate('required', message: 'Deskripsi harus diisi')]
    public $description;
    public $category_id;

    public function mount($id)
    {
        $this->category_id = $id;
        $category = Category::find($id);

        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function save()
    {
        Category::find($this->category_id)->update([
            'name' => $this->name,
            'description' => $this->description
        ]);

        session()->flash('status', 'Data Berhasil Diperbaharui');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    #[Layout('layouts.admin', ['title' => 'Category Edit'])]
    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
