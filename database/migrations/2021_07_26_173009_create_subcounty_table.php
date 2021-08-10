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
                ["name" => "Ruaraka", "county_id" => 1],
                ["name" => "Makadara", "county_id" => 1],
                ["name" => "Dagoretti", "county_id" => 1],
                ["name" => "Kasarani ", "county_id" => 1],
                ["name" => "Kamukunji", "county_id" => 1],
                ["name" => "Embakasi", "county_id" => 1],
                ["name" => "Starehe", "county_id" => 1],
                ["name" => "Langata", "county_id" => 1],
                ["name" => "Westlands", "county_id" => 1]
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tbl_subcounty');
        Schema::enableForeignKeyConstraints();
    }
}
