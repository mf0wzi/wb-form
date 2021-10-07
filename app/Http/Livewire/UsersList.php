<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersList extends LivewireDatatable
{

    public function builder()
    {
        return User::query()
            ->orderBy('id');
    }

    public function columns()
    {
        return [
            Column::callback(['id', 'uuid', 'name', 'phone', 'email'],
                function ($id, $uuid, $name, $phone, $email) {
                    return view('livewire.table-actions2', [
                        'sentID' => $id,
                        'sentUUID' => $uuid,
                        'sentName' => $name,
                        'sentPhone' => $phone,
                        'sentEmail' => $email
                    ]);
                })->label('Action'),
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('uuid')
                ->label('UUID')
                ->hide(),
            Column::name('name')
                ->label('إلاسم الانجليزي')
                ->searchable()
                ->filterable(),
            Column::name('phone')
                ->label('رقم الهاتف المحمول')
                ->searchable()
                ->filterable(),
            Column::name('email')
                ->label('بريد الالكتروني')
                ->searchable()
                ->filterable(),
            BooleanColumn::name('role')
                ->label('Role')
                ->filterable(),
            DateColumn::name('created_at'),
        ];
    }
}
