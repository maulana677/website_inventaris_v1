<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProductCreate extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Kode produk harus diisi')]
    public $product_code;

    #[Validate('required', message: 'Nama produk harus diisi')]
    public $product_name;

    #[Validate('required', message: 'Kategori harus diisi')]
    public $category_id;

    #[Validate('required', message: 'Stock harus diisi')]
    public $stock;

    #[Validate('required', message: 'Nama kategori harus diisi')]
    public $purchase_price;

    #[Validate('required', message: 'Harga jual harus diisi')]
    public $selling_price;

    #[Validate('required', message: 'Deskripsi harus diisi')]
    public $description;

    #[Validate('required|image')]
    public $photo;

    public function save()
    {
        $this->validate();

        $filename = date('Y_m_d_his') . '-' . Str::slug($this->product_name) . '.jpg';
        $this->photo->storeAs(path: 'public/product', name: $filename);

        Product::create([
            'product_code' => $this->product_code,
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'selling_price' => $this->selling_price,
            'description' => $this->description,
            'photo' => $this->photo->storeAs(path: 'product', name: $filename)
        ]);

        session()->flash('status', 'Data Berhasil Ditambahkan');
        return $this->redirectRoute('admin.produk', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.product-create', [
            'categories' => Category::all()
        ]);
    }
}
