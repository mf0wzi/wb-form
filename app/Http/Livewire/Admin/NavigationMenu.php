<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationMenu extends Component
{
    public $role;

    public function mount()
    {
        $this->role = Auth::user()->role;
    }

    public function render()
    {
        return view('livewire.admin.navigation-menu');
    }
}
