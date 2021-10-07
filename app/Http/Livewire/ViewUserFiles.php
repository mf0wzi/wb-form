<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewUserFiles extends Component
{

    protected $listeners = ['openFileForm' => 'openFileModal'];

    public $actionFileActivation = false;
    public $user_id, $uuid, $name;

    public function openFileModal($Id, $uuid, $name)
    {
        $this->reset(['user_id', 'uuid', 'name']);
        $this->user_id =$Id;
        $this->uuid =$uuid;
        $this->name =$name;
        $this->actionFileActivation = true;
    }

    public function closeFileModal()
    {
        $this->reset(['user_id', 'uuid', 'name']);
        $this->actionFileActivation = false;
    }

    public function render()
    {
        return view('livewire.view-user-files');
    }
}
