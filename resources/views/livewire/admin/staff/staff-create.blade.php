<div>
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Tambah Staff</h3>
        <a wire:navigate href="{{ route('admin.staff') }}" class="btn btn-secondary">Batal</a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" wire:model="name" id="name" class="form-control">
                            <div class="text-danger fs-7">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" wire:model="email" id="email" class="form-control">
                            <div class="text-danger fs-7">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" wire:model="password" id="password" class="form-control">
                            <div class="text-danger fs-7">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Simpan Baru
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
