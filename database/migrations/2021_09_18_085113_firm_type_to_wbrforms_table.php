<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FirmTypeToWbrformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wbrforms', function (Blueprint $table) {
            $table->string('firmType')->nullable('none');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wbrforms', function (Blueprint $table) {
            $table->dropColumn('firmType');
        });
    }
}
