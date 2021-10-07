<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\Wbrform;
use App\Models\Uploadfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ViewAlls extends LivewireDatatable
{
    public $exportable = true;
    //public $hideable = 'select';
    //public $complex = true;
    //public $persistComplexQuery = true;

    public function builder()
    {
        $user = User::query()
            ->leftJoin('wbrforms', 'wbrforms.user_id', 'users.id')
            ->where('users.role','=',0);
        return $user;
    }

    public function getAllCityName()
    {
        return City::pluck('city_name_ar');
    }

    public function getAllDistrictName()
    {
        return District::pluck('district_name_ar');
    }

    public function download($id, $uuid, $name)
    {
        return Excel::download(new UsersExport($id, $uuid, $name), "$name.xlsx");
    }

    public function upload($id, $uuid, $name)
    {
        $this->emitTo('view-user-files','openFileForm',$id, $uuid, $name);
    }

    public function view($sentID, $sentUUID, $sentName)
    {
        $this->emitTo('view-users','activateForm',$sentID, $sentUUID, $sentName);
    }

    public function edit($sentID, $sentUUID, $sentName)
    {
        $this->emitTo('add-form','openForm','update', $sentUUID, $sentID, $sentName);
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
                    'sentEmail' => $email,
                    'sendFileCount' => DB::table('upload_files')->where('user_id','=', $id)->count()
                ]);
            })->label('Action'),
            NumberColumn::name('id')
                ->label('ID')
                ->searchable(),
            Column::name('uuid')
                ->label('UUID')
                ->hide(),
            DateColumn::name('created_at')
                ->defaultSort('desc')
                ->label('Create Date'),
            Column::name('email')
                ->label('بريد الالكتروني')
                ->searchable()
                ->filterable()
                ->hide(),
            Column::name('phone')
                ->label('رقم الهاتف المحمول')
                ->searchable()
                ->filterable(),
            Column::name('name')
                ->label('إسم االمستخدم')
                ->searchable()
                ->filterable(),
            Column::name('wbrform.arabic_name')
                ->label('إلاسم العربي')
                ->searchable()
                ->filterable(),
            Column::name('wbrform.english_name')
                ->label('إلاسم الانجليزي')
                ->searchable()
                ->hide(),
            Column::name('wbrform.gender')
                ->label('جنس')
                ->searchable()
                ->filterable(['male','female']),
            DateColumn::name('wbrforms.birthday')
                ->defaultSort('desc')
                ->hide()
                ->label('تاريخ الميلاد'),
            Column::callback(['wbrforms.city'], function ($cityIid) {
                //var_dump($cityIid);
                $cityName = City::where('id','=',$cityIid)->value('city_name_ar');
                return $cityName;
            })->label('المدينة')
                ->hide()
                ->filterable($this->getAllCityName()),
            Column::callback(['wbrforms.district'], function ($districtid) {
                $districtName = District::where('id','=',$districtid)->value('district_name_ar');
                return $districtName;
            })->label('المديرية')
                ->hide()
                ->filterable($this->getAllDistrictName()),
            NumberColumn::name('wbrforms.mobile_number')
                ->hide()
                ->defaultSort('desc')
                ->label('رقم الهاتف المحمول'),
            NumberColumn::name('wbrforms.kin_mobile_number')
                ->defaultSort('desc')
                ->label('رقم جوال أقرب'),
            Column::name('wbrform.com_name')
                ->label('اسم الشركة')
                ->searchable()
                ->filterable(),
            Column::callback(['wbrforms.firmType'], function ($type) {
                $firmType = 'غير متوفر';
                if($type == 'cooperative_association') {
                    $firmType = 'جمعية تعاونية';
                } elseif($type == 'company') {
                    $firmType = 'شركة';
                } elseif($type == 'supply_chains') {
                    $firmType = 'سلاسل امداد';
                }
                return $firmType;
            })->label('نوع المنشأة')
                ->filterable(['جمعية تعاونية','شركة', 'سلاسل امداد']),
            Column::callback(['wbrforms.com_city'], function ($cityIid) {
                //var_dump($cityIid);
                $cityName = City::where('id','=',$cityIid)->value('city_name_ar');
                return $cityName;
            })->label('المحافظة الشركة')
                ->filterable($this->getAllCityName()),
            Column::callback(['wbrforms.com_district'], function ($districtid) {
                $districtName = District::where('id','=',$districtid)->value('district_name_ar');
                return $districtName;
            })->label('المديرية الشركة')
                ->filterable($this->getAllDistrictName()),
            Column::callback(['wbrforms.com_sector'], function ($sectorId) {
                $sectorName = 'غير متوفر';
                if($sectorId == 'food_processing') {
                    $sectorName = 'إنتاج أغذية';
                } elseif($sectorId == 'agriculture') {
                    $sectorName = 'زراعي';
                } elseif($sectorId == 'fish') {
                    $sectorName = 'سمكي';
                } elseif($sectorId == 'livestock') {
                    $sectorName = 'ثروة حيوانية';
                } elseif($sectorId == 'others') {
                    $sectorName = 'أخرى';
                }
                return $sectorName;
            })->label('قطاع المنشآة')
                ->filterable(['إنتاج أغذية','زراعي','سمكي','ثروة حيوانية','أخرى']),
            Column::callback(['wbrforms.com_area'], function ($areaId) {
                $areaName = 'غير متوفر';
                if($areaId == 'commercial') {
                    $areaName = 'تجاري';
                } elseif($areaId == 'services') {
                    $areaName = 'خدمي';
                } elseif($areaId == 'industrial') {
                    $areaName = 'صناعي';
                } elseif($areaId == 'production') {
                    $areaName = 'إنتاجي';
                }
                return $areaName;
            })->label('مجال العمل')
                ->filterable(['تجاري','خدمي','صناعي','إنتاجي']),
            NumberColumn::name('wbrforms.com_number')
                ->defaultSort('desc')
                ->label('رقم تلفون المنشأة'),
            Column::name('wbrforms.address')
                ->hide()
                ->defaultSort('desc')
                ->label('العنوان'),
            Column::name('wbrforms.com_address')
                ->defaultSort('desc')
                ->label('عنوان المنشأة'),
            Column::callback(['wbrforms.qualification'], function ($qualificationid) {
                $qualificationName = 'غير متوفر';
                if($qualificationid == 'school') {
                    $qualificationName = 'المدرسة';
                } elseif($qualificationid == 'high_school') {
                    $qualificationName = 'المدرسة الثانوية';
                } elseif($qualificationid == 'diploma') {
                    $qualificationName = 'دبلوم';
                } elseif($qualificationid == 'university') {
                    $qualificationName = 'جامعة';
                } elseif($qualificationid == 'master') {
                    $qualificationName = 'ماجستير';
                } elseif($qualificationid == 'phd') {
                    $qualificationName = 'دكتوراه';
                }
                return $qualificationName;
            })->label('المؤهل الدراسي')
                ->hide()
                ->filterable($this->getAllDistrictName()),
            Column::name('wbrforms.email')
                ->defaultSort('desc')
                ->hide()
                ->label('البريد الالكتروني'),
            Column::name('wbrforms.com_email')
                ->defaultSort('desc')
                ->hide()
                ->label('البريد الالكتروني الشرك'),
        ];
    }
}
