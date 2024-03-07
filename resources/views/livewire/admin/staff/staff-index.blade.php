<div>
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Staff</h3>
        <a wire:navigate href="{{ route('admin.staff.create') }}" class="btn btn-primary">Tambah Staff</a>
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
                            <th>No</th>
                            <th>Nama Staff</th>
                            <th>Alamat Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $key => $item)
                            <tr class="align-middle">
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a wire:navigate href="{{ route('admin.staff.edit', $item->id) }}"
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
