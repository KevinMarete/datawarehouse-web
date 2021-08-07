<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSubcountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subcounty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('county_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'county_id']);

            $table->foreign('county_id')->references('id')->on('tbl_county')->onUpdate('cascade')->onDelete('cascade');
        });

        //Add default data
        DB::table('tbl_subcounty')->insert(
            [
                ['name' => '', 'county_id' => '', 'created_at' => now()],
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
        Schema::dropIfExists('tbl_subcounty');
    }
}
