<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Wbrform;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection, WithHeadings
{
    use Exportable;
    private $id;
    private $uuid;
    private $name;


    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    public function __construct($id, $uuid, $name)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $form = Wbrform::with('user')->where('uuid', '=', $this->uuid)->get();
        //dd($form);
        return $form;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return ["your", "headings", "here"];
        // TODO: Implement headings() method.
    }
}
