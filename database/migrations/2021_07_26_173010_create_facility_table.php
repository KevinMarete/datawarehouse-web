<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facility', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mflcode');
            $table->string('name');
            $table->integer('subcounty_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['mflcode', 'subcounty_id']);

            $table->foreign('subcounty_id')->references('id')->on('tbl_subcounty')->onUpdate('cascade')->onDelete('cascade');
        });

        //Add default data
        DB::table('tbl_facility')->insert(
            [
                ['mflcode' => '', 'name' => '', 'subcounty_id' => '', 'created_at' => now()],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facility');
    }
}
