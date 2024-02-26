<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class ProductEdit extends Component
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

    public $photo;

    public $product_id;

    public function mount($id)
    {
        $product = Product::find($id);
        $this->product_id = $id;
        $this->product_code = $product->product_code;
        $this->product_name = $product->product_name;
        $this->category_id = $product->category_id;
        $this->stock = $product->stock;
        $this->purchase_price = $product->purchase_price;
        $this->selling_price = $product->selling_price;
        $this->description = $product->description;
    }

    public function save()
    {
        $this->validate();

        if (!empty($this->photo)) {
            $filename = date('Y_m_d_his') . '-' . Str::slug($this->product_name) . '.jpg';
            $this->photo->storeAs(path: 'public/product', name: $filename);

            Product::find($this->product_id)->update([
                'product_code' => $this->product_code,
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'selling_price' => $this->selling_price,
                'photo' => $this->photo->storeAs(path: 'product', name: $filename)
            ]);
        } else {
            Product::find($this->product_id)->update([
                'product_code' => $this->product_code,
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'selling_price' => $this->selling_price,
            ]);
        }

        session()->flash('status', 'Produk Berhasil Diubah.');
        return $this->redirectRoute('admin.produk', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.product-edit', [
            'categories' => Category::all()
        ]);
    }
}
