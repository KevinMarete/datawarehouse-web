<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etl_program_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->date('activity_date');
            $table->string('activity');
            $table->string('sub_activity');
            $table->integer('no_of_pax');
            $table->string('sub_county');
            $table->string('facility');
            $table->string('received_by');
            $table->integer('cost_kes');
            $table->integer('cost_usd');
            $table->string('program_area');
            $table->string('funding_stream');
            $table->string('expenditure_analysis');
            $table->unique(['activity_date', 'activity', 'sub_activity']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etl_program_data');
    }
}
