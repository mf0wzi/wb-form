<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wbrform extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'com_file_upload',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
