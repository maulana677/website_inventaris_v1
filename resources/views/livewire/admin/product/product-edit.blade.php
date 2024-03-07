<div>
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Edit Produk</h3>
        <a wire:navigate href="{{ route('admin.produk') }}" class="btn btn-secondary">Batal</a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="product_name">Nama Produk</label>
                            <input type="text" wire:model="product_name" id="product_name" class="form-control">
                            <div class="text-danger fs-7">
                                @error('product_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id">Kategori</label>
                            <select wire:model="category_id" id="category_id" class="form-select">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger fs-7">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_code">Kode Produk</label>
                            <input type="text" wire:model="product_code" id="product_code" class="form-control">
                            <div class="text-danger fs-7">
                                @error('product_code')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock">Stok</label>
                            <input type="number" wire:model="stock" id="stock" class="form-control">
                            <div class="text-danger fs-7">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="purchase_price">Harga Beli</label>
                            <input type="number" wire:model="purchase_price" id="purchase_price" class="form-control">
                            <div class="text-danger fs-7">
                                @error('purchase_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="selling_price">Harga Jual</label>
                            <input type="number" wire:model="selling_price" id="selling_price" class="form-control">
                            <div class="text-danger fs-7">
                                @error('selling_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description">Deskripsi Produk</label>
                            <textarea wire:model="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            <div class="text-danger fs-7">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="photo">Foto Produk</label>
                            <input type="file" wire:model="photo" id="photo" class="form-control"
                                accept="image/*">
                            <div class="text-danger fs-7">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
