<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wbrform;
use App\Models\City;
use App\Models\District;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ViewUsers extends Component
{
    protected $listeners = ['activateForm' => 'showForm'];

    use WithFileUploads;

    public $step = 1;
    public $user_id, $uuid;
    public $files = 1;
    public $districts=[];
    public $com_districts=[];
    public $downloads = [];
    public $Validation = [
        'arabic_name' => 'required|string|min:2|max:225|regex:/^[\p{Arabic}\s]+$/u',
        'english_name' => 'required|string|max:225|regex:/^[a-zA-Z ]*$/u',
        'gender' => 'required|string|in:male,female',
        'birthday' => 'required|date|date_format:Y-m-d',
        'mobile_number' => 'required|string|min:9|max:9|regex:/^[7][0-9]*$/u',
        'kin_mobile_number' => 'required|string|min:9|max:9|regex:/^[7][0-9]*$/u',
        'city' => 'required|string',
        'district' => 'required|string',
        'address' => 'required|string',
        'qualification' => 'required|string',
        'email' => 'required|email|max:191'
    ];
    public $docs = [];
    public $sentID, $sentUUID, $sentName, $sentType, $sentPhone, $sentEmail;
    public $wbr_id, $wbr_user_id, $arabic_name, $english_name, $gender, $birthday,
        $mobile_number, $kin_mobile_number, $city, $district, $address, $qualification,
        $email, $com_name, $firmType, $com_city, $com_district, $com_address, $com_number, $com_fax,
        $com_email, $com_sector, $com_other_sector, $com_area, $com_activities, $com_size,
        $com_esta_date, $com_male_per_emp_no, $com_female_per_emp_no, $com_per_emp_avg_salary,
        $com_male_tem_emp_no, $com_female_tem_emp_no, $com_tem_emp_avg_salary, $com_bank_account,
        $com_other_bank_account, $com_permit, $com_permit_other, $com_permit_renewal_date,
        $com_archive, $com_clients_no_2020, $com_supplier_no, $com_firm_no, $com_external_audit,
        $com_external_audit_yes, $com_last_external_audit, $com_partner, $com_your_job_description,
        $com_your_job_description_other, $com_financial_source, $com_financial_source_amount,
        $com_smeps_financial_assist_before, $com_how_do_you_know, $com_how_do_you_know_other,
        $com_file_upload;
    public $actionActivation = false;

    public function incrementOnly()
    {
        if($this->step != 'complete'){
            $this->step++;
        }
    }

    public function addFilesField()
    {
        if($this->files < 4) {
            $this->files = $this->files + 1;
        }
    }

    public function decrement()
    {
        $this->step--;
    }

    public function completeOnly()
    {
        $this->alert('success', 'استمارة التسجيل أنهى بنجاح');
        $this->step = 1;
    }

    public function showForm($Id, $uuid, $name)
    {
        $this->reset([
            'id',
            'uuid',
            'user_id',
            'arabic_name',
            'english_name',
            'gender',
            'birthday',
            'mobile_number',
            'kin_mobile_number',
            'city',
            'district',
            'address',
            'qualification',
            'email',
            'com_name',
            'firmType',
            'com_city',
            'com_district',
            'com_address',
            'com_number',
            'com_fax',
            'com_email',
            'com_sector',
            'com_other_sector',
            'com_area',
            'com_activities',
            'com_size',
            'com_esta_date',
            'com_male_per_emp_no',
            'com_female_per_emp_no',
            'com_per_emp_avg_salary',
            'com_male_tem_emp_no',
            'com_female_tem_emp_no',
            'com_tem_emp_avg_salary',
            'com_bank_account',
            'com_other_bank_account',
            'com_permit',
            'com_permit_other',
            'com_permit_renewal_date',
            'com_archive',
            'com_clients_no_2020',
            'com_supplier_no',
            'com_firm_no',
            'com_external_audit',
            'com_external_audit_yes',
            'com_last_external_audit',
            'com_partner',
            'com_your_job_description',
            'com_your_job_description_other',
            'com_financial_source',
            'com_financial_source_amount',
            'com_smeps_financial_assist_before',
            'com_how_do_you_know',
            'com_how_do_you_know_other',
            'com_file_upload'
        ]);
        $this->step = 1;
        $this->user_id = $Id;;
        $this->uuid = $uuid;
        $this->sentType = Auth::user()->is_admin;

        if (!preg_match('/[^A-Za-z ]/', $name)) // '/[^a-z\d]/i' should also work.
        {
            $this->english_name = $name;
        } else {
            $this->arabic_name = $name;
        }
        $this->wbr_user_id = $this->user_id;


        if($this->user_id){
            $this->mobile_number = $this->sentPhone;
            $this->email = $this->sentEmail;
            $selectedFieldsValues = Wbrform::firstWhere('uuid','=',$this->uuid);

            if($selectedFieldsValues){
                $values = $selectedFieldsValues;
                if($values['uuid'] === $this->uuid) {
                    $this->wbr_id = $values['id'];
                    $this->uuid = $values['uuid'];
                    $this->wbr_user_id = $values['user_id'];
                    $this->arabic_name = $values['arabic_name'];
                    $this->english_name = $values['english_name'];
                    $this->gender = $values['gender'];
                    $this->birthday = $values['birthday'];
                    $this->mobile_number = $values['mobile_number'];
                    $this->kin_mobile_number = $values['kin_mobile_number'];
                    $this->city = $values['city'];
                    $this->district = $values['district'];
                    $this->address = $values['address'];
                    $this->qualification = $values['qualification'];
                    $this->email = $values['email'];
                    $this->com_name = $values['com_name'];
                    $this->firmType = $values['firmType'];
                    $this->com_city = $values['com_city'];
                    $this->com_district = $values['com_district'];
                    $this->com_address = $values['com_address'];
                    $this->com_number = $values['com_number'];
                    $this->com_fax = $values['com_fax'];
                    $this->com_email = $values['com_email'];
                    $this->com_sector = $values['com_sector'];
                    $this->com_other_sector = $values['com_other_sector'];
                    $this->com_area = $values['com_area'];
                    $this->com_activities = $values['com_activities'];
                    $this->com_size = $values['com_size'];
                    $this->com_esta_date = $values['com_esta_date'];
                    $this->com_male_per_emp_no = $values['com_male_per_emp_no'];
                    $this->com_female_per_emp_no = $values['com_female_per_emp_no'];
                    $this->com_per_emp_avg_salary = $values['com_per_emp_avg_salary'];
                    $this->com_male_tem_emp_no = $values['com_male_tem_emp_no'];
                    $this->com_female_tem_emp_no = $values['com_female_tem_emp_no'];
                    $this->com_tem_emp_avg_salary = $values['com_tem_emp_avg_salary'];
                    $this->com_bank_account = $values['com_bank_account'];
                    $this->com_other_bank_account = $values['com_other_bank_account'];
                    $this->com_permit = $values['com_permit'];
                    $this->com_permit_other = $values['com_permit_other'];
                    $this->com_permit_renewal_date = $values['com_permit_renewal_date'];
                    $this->com_archive = $values['com_archive'];
                    $this->com_clients_no_2020 = $values['com_clients_no_2020'];
                    $this->com_supplier_no = $values['com_supplier_no'];
                    $this->com_firm_no = $values['com_firm_no'];
                    $this->com_external_audit = $values['com_external_audit'];
                    $this->com_external_audit_yes = $values['com_external_audit_yes'];
                    $this->com_last_external_audit = $values['com_last_external_audit'];
                    $this->com_partner = $values['com_partner'];
                    $this->com_your_job_description = $values['com_your_job_description'];
                    $this->com_your_job_description_other = $values['com_your_job_description_other'];
                    $this->com_financial_source = $values['com_financial_source'];
                    $this->com_financial_source_amount = $values['com_financial_source_amount'];
                    $this->com_smeps_financial_assist_before = $values['com_smeps_financial_assist_before'];
                    $this->com_how_do_you_know = $values['com_how_do_you_know'];
                    $this->com_how_do_you_know_other = $values['com_how_do_you_know_other'];
                    $this->com_file_upload = $values['com_file_upload'];
                }
            }

        } else {

            $this->arabic_name = null;
            $this->english_name = null;
            $this->gender = null;
            $this->birthday = null;
            $this->mobile_number = Auth::user()->phone;
            $this->kin_mobile_number = null;
            $this->city = 1;
            $this->district = 1;
            $this->address = null;
            $this->qualification = null;
            $this->email = Auth::user()->email;
            $this->com_name = null;
            $this->firmType = null;
            $this->com_city = 1;
            $this->com_district = 1;
            $this->com_address = null;
            $this->com_number = null;
            $this->com_fax = null;
            $this->com_email = null;
            $this->com_sector = null;
            $this->com_other_sector = null;
            $this->com_area = null;
            $this->com_activities = null;
            $this->com_size = null;
            $this->com_esta_date = null;
            $this->com_male_per_emp_no = null;
            $this->com_female_per_emp_no = null;
            $this->com_per_emp_avg_salary = null;
            $this->com_male_tem_emp_no = null;
            $this->com_female_tem_emp_no = null;
            $this->com_tem_emp_avg_salary = null;
            $this->com_bank_account = null;
            $this->com_other_bank_account = null;
            $this->com_permit = null;
            $this->com_permit_other = null;
            $this->com_permit_renewal_date = null;
            $this->com_archive = null;
            $this->com_clients_no_2020 = null;
            $this->com_supplier_no = null;
            $this->com_firm_no = null;
            $this->com_external_audit = null;
            $this->com_external_audit_yes = null;
            $this->com_last_external_audit = null;
            $this->com_partner = null;
            $this->com_your_job_description = null;
            $this->com_your_job_description_other = null;
            $this->com_financial_source = null;
            $this->com_financial_source_amount = null;
            $this->com_smeps_financial_assist_before = null;
            $this->com_how_do_you_know = null;
            $this->com_how_do_you_know_other = null;
            $this->com_file_upload = null;

        }


        $this->actionActivation = true;
    }

    public function hideForm()
    {
        $this->actionActivation = false;
    }

    public function render()
    {
        if(!empty($this->city)) {
            $this->districts = District::where('city_id', $this->city)->get();
        }
        if(!empty($this->com_city)) {
            $this->com_districts = District::where('city_id', $this->com_city)->get();
        }

        return view('livewire.view-users')
            ->withCities(City::orderBy('city_name')->get());
    }
}
