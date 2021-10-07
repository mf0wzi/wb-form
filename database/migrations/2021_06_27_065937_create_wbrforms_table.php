<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWbrformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wbrforms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('uuid')->nullable(false);
            $table->string('arabic_name');
            $table->string('english_name');
            $table->string('gender');
            $table->date('birthday');
            $table->string('mobile_number');
            $table->string('kin_mobile_number');
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->string('qualification');
            $table->string('email');
            $table->string('com_name')->nullable();
            $table->string('com_city')->nullable();
            $table->string('com_district')->nullable();
            $table->string('com_address')->nullable();
            $table->string('com_number')->nullable();
            $table->string('com_fax')->nullable();
            $table->string('com_email')->nullable();
            $table->string('com_sector')->nullable();
            $table->string('com_other_sector')->nullable();
            $table->string('com_area')->nullable();
            $table->text('com_activities')->nullable();
            $table->string('com_size')->nullable();
            $table->date('com_esta_date')->nullable();
            $table->integer('com_male_per_emp_no')->nullable();
            $table->integer('com_female_per_emp_no')->nullable();
            $table->decimal('com_per_emp_avg_salary',12,2)->nullable();
            $table->integer('com_male_tem_emp_no')->nullable();
            $table->integer('com_female_tem_emp_no')->nullable();
            $table->decimal('com_tem_emp_avg_salary',12,2)->nullable();
            $table->string('com_bank_account')->nullable();
            $table->string('com_other_bank_account')->nullable();
            $table->string('com_permit')->nullable();
            $table->string('com_permit_other')->nullable();
            $table->date('com_permit_renewal_date')->nullable();
            $table->string('com_archive')->nullable();
            $table->integer('com_clients_no_2020')->nullable();
            $table->integer('com_supplier_no')->nullable();
            $table->integer('com_firm_no')->nullable();
            $table->string('com_external_audit')->nullable();
            $table->string('com_external_audit_yes')->nullable();
            $table->string('com_last_external_audit')->nullable();
            $table->string('com_partner')->nullable();
            $table->string('com_your_job_description')->nullable();
            $table->string('com_your_job_description_other')->nullable();
            $table->string('com_financial_source')->nullable();
            $table->string('com_financial_source_amount')->nullable();
            $table->string('com_smeps_financial_assist_before')->nullable();
            $table->string('com_how_do_you_know')->nullable();
            $table->string('com_how_do_you_know_other')->nullable();
            $table->string('com_file_upload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wbrforms');
    }
}
