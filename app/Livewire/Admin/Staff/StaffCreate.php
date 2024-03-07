<?php

namespace App\Livewire\Admin\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StaffCreate extends Component
{
    #[Validate('required')]
    public $name, $password;

    #[Validate('required|unique:users')]
    public $email;

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('status', 'Staff Baru Berhasil Dibuat');
        return $this->redirectRoute('admin.staff', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.staff.staff-create');
    }
}
