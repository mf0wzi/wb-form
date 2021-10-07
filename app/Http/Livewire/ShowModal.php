<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowModal extends Component
{
    public $actionActivation = false;

    protected $listeners = ['activateModal' => 'activate'];

    public function render()
    {
        return view('livewire.show-modal');
    }

    public function activate()
    {
        dd('here');
        $this->actionActivation = true;
    }

    public function deactivate()
    {
        $this->actionActivation = false;
    }
}
