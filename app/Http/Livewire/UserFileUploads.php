<?php

namespace App\Http\Livewire;

use App\Models\Uploadfile;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserFileUploads extends LivewireDatatable
{
    public $user_id, $uuid;

    public function builder()
    {

        if(Auth::user()->role == 0){
            $this->uuid = Auth::user()->uuid;
        }
        $files = (new Uploadfile())
            ->newQuery()
            ->where('uuid', '=', $this->uuid);
        return $files;
    }

    public function download($id, $uuid, $file, $filename, $file_path)
    {
        //dd($id, $uuid, $file, $filename, $file_path);
        $destination = storage_path('app/'.$file_path.'/'.$file);
        // dd($destination);
//        dd(C:\wamp64\www\wbr-app\storage\documents\544334ee-f1e2-4eb7-9144-4519ab25da79/qHdga2ZYND11D571wsqIJ1Ajc84Ng7zNvGRUKNJb.png);
//        dd(response()->download($destination));
        return response()->download($destination);
//        return Storage::disk('local')->download($filename);
    }

    public function columns()
    {
        $columns = [
            NumberColumn::name('id')
                ->defaultSort('asc')
                ->label('ID')
                ->hide(),
            Column::name('uuid')
                ->label('UUID')
                ->searchable()
                ->truncate(100)
                ->alignCenter()
                ->hide(),
            Column::name('user_id')
                ->label('User Id')
                ->searchable()
                ->truncate(100)
                ->alignCenter()
                ->hide(),
            Column::name('file')
                ->label('Name')
                ->searchable()
                ->truncate(100)
                ->alignCenter(),
            Column::name('filename')
                ->label('filename')
                ->searchable()
                ->truncate(100)
                ->alignCenter()
                ->hide(),
            Column::name('file_path')
                ->label('Path')
                ->searchable()
                ->truncate(100)
                ->alignCenter()
                ->hide(),
            Column::callback(['id','uuid', 'file', 'filename', 'file_path'], function ($id, $uuid, $file, $filename, $file_path) {
                return view('livewire.table-actions', ['id' => $id, 'uuid' => $uuid, 'file' => $file, 'filename' => $filename, 'file_path' => $file_path]);
            })
        ];

        return $columns;
    }
}
