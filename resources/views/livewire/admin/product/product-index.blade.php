<div>
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Produk</h3>
        <a wire:navigate href="{{ route('admin.produk.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori Produk</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr class="align-middle">
                                <td>{{ $item->product_code }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ number_format($item->stock) }}</td>
                                <td>Rp. {{ number_format($item->purchase_price) }}</td>
                                <td>Rp. {{ number_format($item->selling_price) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a wire:navigate href="{{ route('admin.produk.edit', $item->id) }}"
                                            class="btn
                                            btn-warning btn-sm text-white">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <button wire:confirm="Apakah anda yakin ingin menghapus data ?"
                                            wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
