<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Wbrform;
use App\Models\City;
use App\Models\District;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddForm extends Component
{
    protected $listeners = ['openForm' => 'openNewAddForm'];

    use WithFileUploads;

    public $step = 1;
    public $user_id, $uuid;
    public $files = 1;
    public $districts=[];
    public $com_districts=[];
    public $downloads = [];
    public $Validation = [
        'arabic_name' => 'required|string|min:2|max:225|regex:/^[\p{Arabic} \s]+$/u',
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
    public $type, $form_user_id, $wbr_uuid;
    //public $sentID, $sentUUID, $sentName, $sentType, $sentPhone, $sentEmail;
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
    public $openAddForm = false;

    public function openNewAddForm($type = null, $uuid = null, $Id = null,  $name = null)
    {
        $this->reset([
            'id',
            'uuid',
            'user_id',
            'form_user_id',
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
        $this->form_user_id = $Id;
        $this->uuid = $uuid;
        $this->type = $type;
        $this->sentType = Auth::user()->is_admin;
        $this->wbr_user_id = $this->form_user_id;
        $this->wbr_uuid = $this->uuid;

        if($this->type === 'new'){
            $this->arabic_name = null;
            $this->english_name = null;
            $this->gender = null;
            $this->birthday = null;
            $this->mobile_number = null;
            $this->kin_mobile_number = null;
            $this->city = 1;
            $this->district = 1;
            $this->address = null;
            $this->qualification = null;
            $this->email = null;
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
        else if($this->type === 'update' && $this->form_user_id != null){
            $selectedFieldsValues = Wbrform::firstWhere('uuid','=',$this->uuid);
            $values = $selectedFieldsValues;
            if($values != null && $values['uuid'] === $this->uuid) {
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
            elseif ($values == null){
                $this->type = 'newUpdate';
                $selectedFieldsValues = User::firstWhere('uuid','=',$this->uuid);
                $userValue = $selectedFieldsValues;
                if($userValue['uuid'] != null && $userValue['uuid'] === $this->uuid){
                    $nameArType = null;
                    $nameEnType = null;
                    if (!preg_match('/[^A-Za-z ]/', $userValue['name'])) // '/[^a-z\d]/i' should also work.
                    {
                        $nameEnType = $userValue['name'];
                    } else {
                        $nameArType = $userValue['name'];
                    }
                    $this->arabic_name = $nameArType;
                    $this->english_name = $nameEnType;
                    $this->gender = null;
                    $this->birthday = null;
                    $this->mobile_number = $userValue['phone'];
                    $this->kin_mobile_number = null;
                    $this->city = 1;
                    $this->district = 1;
                    $this->address = null;
                    $this->qualification = null;
                    $this->email = null;
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
            }
        }

        $this->openAddForm = true;
    }

    public function updated($propertyName, $value)
    {
        $this->validateOnly($propertyName, $this->Validation);
        if($propertyName == 'com_bank_account'
            || $propertyName == 'com_permit'
            || $propertyName == 'com_external_audit'
            || $propertyName == 'com_your_job_description'
            || $propertyName == 'com_financial_source'
            || $propertyName == 'com_how_do_you_know' ) {
            $this->change($propertyName, $value);
        }
    }

    public function change($propertyName, $value)
    {
        if($propertyName == 'com_bank_account'){
            if($value != 'others'){
                $this->reset(['com_other_bank_account']);
            }
//            $value != 'others' ? $this->reset(['com_other_bank_account']):;
        } elseif($propertyName == 'com_permit'){
            if($value != 'others'){
                $this->reset(['com_permit_other']);
            } elseif ($value == 'none') {
                $this->reset(['com_permit_other', 'com_permit_renewal_date']);
            }
        } elseif($propertyName == 'com_external_audit'){
            if($value != 'yes'){
                $this->reset(['com_external_audit_yes', 'com_last_external_audit']);
            }
        } elseif($propertyName == 'com_your_job_description'){
            if($value != 'others'){
                $this->reset(['com_your_job_description_other']);
            }
        } elseif($propertyName == 'com_financial_source'){
            if($value != 'yes'){
                $this->reset(['com_financial_source_amount']);
            }
        } elseif($propertyName == 'com_how_do_you_know'){
            if($value != 'others'){
                $this->reset(['com_how_do_you_know_other']);
            }
        }
    }

    public function increment()
    {
        if($this->step === 1) {

            $this->Validation = [
                'arabic_name' => 'required|string|min:2|max:225|regex:/^[\p{Arabic} \s]+$/u',
                'english_name' => 'required|string|max:225|regex:/^[a-zA-Z ]*$/u',
                'gender' => 'required|string|in:male,female',
                'birthday' => 'required|date|date_format:Y-m-d',
                'mobile_number' => 'required|string|min:9|max:9|regex:/^[7][0-9]*$/u',
                'kin_mobile_number' => 'required|string|min:9|max:9|regex:/^[7][0-9]*$/u',
                'city' => 'required|string',
                'district' => 'required|string',
                'address' => 'required|string',
                'qualification' => 'required|string',
                'email' => 'nullable|email|max:191'
            ];

            $this->validate($this->Validation);

            $array= [
                'uuid' => $this->uuid,
                'arabic_name' => $this->arabic_name,
                'english_name' => $this->english_name,
                'gender' => $this->gender,
                'birthday' => $this->birthday,
                'mobile_number' => $this->mobile_number,
                'kin_mobile_number' => $this->kin_mobile_number,
                'city' => $this->city,
                'district' => $this->district,
                'address' => $this->address,
                'qualification' => $this->qualification,
                'email' => $this->email,
            ];

            $this->submit($array, '1. البيانات الشخصية لصاحب المنشأة ', $this->Validation, 1);

        } else if($this->step === 2) {

            $this->Validation = ['com_name' => 'required|string|max:225',
                'firmType' => 'nullable|string|max:225',
                'com_city' => 'required|string',
                'com_district' => 'required|string',
                'com_address' => 'required|string',
                'com_number' => 'required|string|min:6|max:9|regex:/^[1-9][0-9]*$/u',
                'com_fax' => 'nullable|string|min:6|max:6|regex:/^[1-9][0-9]*$/u',
                'com_email' => 'nullable|email',
                'com_sector' => 'required|string',
                'com_other_sector' => 'required_if:com_sector,others|string|nullable',
                'com_area' => 'required|string',
                'com_activities' => 'required|string',
                'com_size' => 'required|string',
                'com_esta_date' => 'required|date|date_format:Y-m-d',
                'com_male_per_emp_no' => 'required|integer|between:0,9999',
                'com_female_per_emp_no' => 'required|integer|between:0,9999',
                'com_per_emp_avg_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'com_male_tem_emp_no' => 'required|integer|between:0,9999',
                'com_female_tem_emp_no' => 'required|integer|between:0,9999',
                'com_tem_emp_avg_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/'];

            $this->validate($this->Validation);

            $array= [
                'com_name' => $this->com_name,
                'firmType' => $this->firmType,
                'com_city' => $this->com_city,
                'com_district' => $this->com_district,
                'com_address' => $this->com_address,
                'com_number' => $this->com_number,
                'com_fax' =>  $this->com_fax,
                'com_email' => $this->com_email,
                'com_sector' => $this->com_sector,
                'com_other_sector' => $this->com_other_sector,
                'com_area' =>  $this->com_area,
                'com_activities' => $this->com_activities,
                'com_size' => $this->com_size,
                'com_esta_date' => $this->com_esta_date,
                'com_male_per_emp_no' => $this->com_male_per_emp_no,
                'com_female_per_emp_no' => $this->com_female_per_emp_no,
                'com_per_emp_avg_salary' => $this->com_per_emp_avg_salary,
                'com_male_tem_emp_no' => $this->com_male_tem_emp_no,
                'com_female_tem_emp_no' => $this->com_female_tem_emp_no,
                'com_tem_emp_avg_salary' => $this->com_tem_emp_avg_salary,
            ];

            $this->submit($array, '2. بيــــانات المنـــشأة ', $this->Validation, 2);

        } else if($this->step === 3) {

            $this->Validation = ['com_bank_account' => 'required|string|max:225',
                'com_other_bank_account' => 'required_if:com_bank_account,others|string|nullable',
                'com_permit' => 'required|string|max:225',
                'com_permit_other' => 'required_if:com_permit,others|string|max:225|nullable',
                'com_permit_renewal_date' => 'required_unless:com_permit,none|date|date_format:Y-m-d|nullable',
                'com_archive' => 'required|string|max:225',
                'com_clients_no_2020' => 'required|numeric|max:10000',
                'com_supplier_no' => 'required|numeric|max:10000',
                'com_firm_no' => 'required|numeric|max:10000',
                'com_external_audit' => 'required|string|max:225',
                'com_external_audit_yes' => 'required_if:com_external_audit,yes|string|max:225|nullable',
                'com_last_external_audit' => 'required_if:com_external_audit,yes|date|date_format:Y-m-d|nullable',
                'com_partner' => 'required|string|max:225',
                'com_your_job_description' => 'required|string|max:225',
                'com_your_job_description_other' => 'required_if:com_your_job_description,others|string|max:225|nullable',
                'com_financial_source' => 'required|string|max:225',
                'com_financial_source_amount' => 'required_if:com_financial_source,yes|regex:/^\d+(\.\d{1,2})?$/|max:9999999999|nullable',
                'com_smeps_financial_assist_before' => 'required|string|max:225',
            ];

            $this->validate($this->Validation);

            $array= [
                'com_bank_account' => $this->com_bank_account,
                'com_other_bank_account' => $this->com_other_bank_account,
                'com_permit' => $this->com_permit,
                'com_permit_other' => $this->com_permit_other,
                'com_permit_renewal_date' => $this->com_permit_renewal_date,
                'com_archive' => $this->com_archive,
                'com_clients_no_2020' => $this->com_clients_no_2020,
                'com_supplier_no' => $this->com_supplier_no,
                'com_firm_no' => $this->com_firm_no,
                'com_external_audit' => $this->com_external_audit,
                'com_external_audit_yes' => $this->com_external_audit_yes,
                'com_last_external_audit' => $this->com_last_external_audit,
                'com_partner' => $this->com_partner,
                'com_your_job_description' => $this->com_your_job_description,
                'com_your_job_description_other' => $this->com_your_job_description_other,
                'com_financial_source' => $this->com_financial_source,
                'com_financial_source_amount' => $this->com_financial_source_amount,
                'com_smeps_financial_assist_before' => $this->com_smeps_financial_assist_before,
            ];

            $this->submit($array, '3. بيــــانات المنـــشأة ', $this->Validation, 3);

        } else if($this->step === 4) {

            $this->Validation = [
                'com_how_do_you_know' => 'required|string|max:225',
                'com_how_do_you_know_other' => 'required_if:com_how_do_you_know,others|string|max:225|nullable',
            ];

            $this->validate($this->Validation);

            $array= [
                'com_how_do_you_know' => $this->com_how_do_you_know,
                'com_how_do_you_know_other' => $this->com_how_do_you_know_other,
            ];

            $this->submit($array, '4. بيانات عامة', $this->Validation, 4);

        } else if($this->step === 5) {

            // $this->Validation = [
            //     'com_how_do_you_know' => 'required|string|max:225',
            //     'com_how_do_you_know_other' => 'required_if:com_how_do_you_know,others|string|max:225|nullable',
            //     ];

            // $this->validate($this->Validation);

            // $array= [
            //     'com_how_do_you_know' => $this->com_how_do_you_know,
            //     'com_how_do_you_know_other' => $this->com_how_do_you_know_other,
            // ];

            // $this->submit($array, '5. بيانات عامة');

        }

        if($this->step != 'complete'){
            $this->step++;
        }

    }

    public function decrement()
    {
        $this->step--;
    }

    public function complete()
    {
        $this->alert('success', 'استمارة التسجيل أنهى بنجاح');
        $this->step = 1;
    }

    public function submit($array, $message = null, $Validation = null, $step = null)
    {
        $emailAddress = null;

        if($Validation != null) {
            $this->validate($Validation);
        }

        try {
            if($this->type == 'update' && $this->wbr_user_id && $this->wbr_id) {

                if (array_key_exists("user_id", $array)) {
                    unset($array['user_id']);
                }
                if($step == 1) {
                    $emailAddress = ($array['email'] == null || $array['email'] == '') ? Str::random(5) . '@noemail.com' : $array['email'];
                    $array['email'] = $emailAddress;
                } elseif($step == 2){
                    $emailAddress = ($array['com_email'] == null || $array['com_email'] == '') ? Str::random(5) . '@noemail.com' : $array['com_email'];
                    $array['com_email'] = $emailAddress;
                }
                Wbrform::find($this->wbr_id)->update($array);

            } else {
                $emailAddress = ($array['email'] == null || $array['email'] == '') ? Str::random(5).'@noemail.com' : $array['email'];
                if($this->type == 'new') {
                    $userRegistration = User::create(
                        [
                            'name' => $array['arabic_name'],
                            'uuid' => Str::uuid()->toString(),
                            'phone' => $array['mobile_number'],
                            'email' => $emailAddress,
                            'password' => Hash::make(Str::random(10)),
                        ]
                    );
                    $this->form_user_id = $userRegistration->id;
                    $this->uuid = $userRegistration->uuid;
                    $this->wbr_user_id = $userRegistration->id;
                    $array['user_id'] = $this->form_user_id;
                    $array['uuid'] = $this->uuid;
                    $array['email'] = $emailAddress;
                    $this->type = 'update';
                    Wbrform::create($array)->where('user_id', '!=', $this->form_user_id);
                    $this->wbr_id = Wbrform::where('user_id', '=', $this->form_user_id)->value('id');
                    $this->sendEmail($emailAddress, $array['arabic_name'], $array['email']);
                } elseif ($this->type == 'newUpdate') {
                    $this->wbr_user_id = $this->form_user_id;
                    $array['user_id'] = $this->form_user_id;
                    $array['uuid'] = $this->uuid;
                    $array['email'] = $emailAddress;
                    $this->type = 'update';
                    Wbrform::create($array)->where('user_id','!=',$this->form_user_id);
                    $this->wbr_id = Wbrform::where('user_id','=',$this->form_user_id)->value('id');
                }
            }
            $this->emit('refreshLivewireDatatable');
            $this->alert('success', $message);
        } catch (Exception $e) {
            $this->alert('error', "Please try again later.");
        }
    }

    public function hideNewAddForm()
    {
        $this->openAddForm = false;
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  mixed  $email
     */
    public function sendEmail($email, $name = null, $emailCheck = null)
    {
        if($emailCheck == null || $emailCheck == '') {

            $details = [
                'name' => $name,

                'title' => 'مشروع تحسين الحماية المجتمعية والاستجابة لجائحة كورونا',

                'body' => 'تم تسجيل معلومات حسابك الأولية بنجاح ، يرجى تسجيل الدخول مرة أخرى وإكمال استمارة ورفع الملفات المطلوبة',

                'url' => 'https://wb.smeps-brave.org/dashboard/',

                'button' => ' استكمال تسجيل المعلومات المتبقية',

                'thanks' => 'شكرا'

            ];

            $emailAddress = $email;
            Mail::to("$emailAddress")->send(new \App\Mail\SuccessfullyRegistered($details));
        }
    }

    public function render()
    {
        if(!empty($this->city)) {
            $this->districts = District::where('city_id', $this->city)->get();
        }
        if(!empty($this->com_city)) {
            $this->com_districts = District::where('city_id', $this->com_city)->get();
        }

        return view('livewire.add-form')
            ->withCities(City::orderBy('city_name')->get());
    }
}
