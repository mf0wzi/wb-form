<?php

namespace App\Http\Livewire;

use App\Models\Uploadfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploads extends Component
{
    use WithFileUploads;

    public $photo, $count, $file, $filename, $extension, $user_id, $uuid, $role, $name;

    public function mount()
    {
        $this->role = Auth::user()->role;
        if($this->role == 0){
            $this->user_id = Auth::user()->id;
            $this->uuid = Auth::user()->uuid;
            $this->count = Uploadfile::where('uuid','=',$this->uuid)->get()->count();
        } else {
            $this->count = 0;
        }
    }

    public function updated()
    {
        $this->validate([
            'photo' => 'mimes:jpg,jpeg,png,gif,doc,docx,pdf|max:3072', // 3MB Max
        ]);
    }

    public function save()
    {
        $this->validate([
            'photo' => 'mimes:jpg,jpeg,png,gif,doc,docx,pdf|max:3072', // 3MB Max
        ]);

        try {
            $this->file = $this->photo->getClientOriginalName();
            $this->filename = $this->photo->getFilename();
            $this->extension = $this->photo->getClientOriginalExtension();
            $this->photo->storeAs("documents/{$this->uuid}-uploads", $this->file);
            Uploadfile::create([
                'user_id' => $this->user_id,
                'uuid' => $this->uuid,
                'file' => $this->file,
                'filename' => $this->filename,
                'extension' => $this->extension,
                'file_path' => "documents/{$this->uuid}-uploads",
            ]);
            $this->photo = null;
            $this->emit('refreshLivewireDatatable');
            $this->count = Uploadfile::where('uuid','=',$this->uuid)->get()->count();
            $message = " {$this->file} تم رفع هذا الملف ";
            $this->alert('success', $message);

        } catch (Exception $e) {
            $this->alert('error', "هناك خطأ يرجى المحاولة مرة أخرى في وقت لاحق");
        }
    }

    public function render()
    {
        return view('livewire.file-uploads');
    }
}
