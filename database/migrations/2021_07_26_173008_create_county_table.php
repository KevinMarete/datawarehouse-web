<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_county', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name']);
        });

        //Add default data
        DB::table('tbl_county')->insert(
            [
                ["name" => "BARINGO", "created_at" => now()],
                ["name" => "BOMET", "created_at" => now()],
                ["name" => "BUNGOMA", "created_at" => now()],
                ["name" => "BUSIA", "created_at" => now()],
                ["name" => "ELGEYO MARAKWET", "created_at" => now()],
                ["name" => "EMBU", "created_at" => now()],
                ["name" => "GARISSA", "created_at" => now()],
                ["name" => "HOMA BAY", "created_at" => now()],
                ["name" => "ISIOLO", "created_at" => now()],
                ["name" => "KAJIADO", "created_at" => now()],
                ["name" => "KAKAMEGA", "created_at" => now()],
                ["name" => "KERICHO", "created_at" => now()],
                ["name" => "KIAMBU", "created_at" => now()],
                ["name" => "KILIFI", "created_at" => now()],
                ["name" => "KIRINYAGA", "created_at" => now()],
                ["name" => "KISII", "created_at" => now()],
                ["name" => "KISUMU", "created_at" => now()],
                ["name" => "KITUI", "created_at" => now()],
                ["name" => "KWALE", "created_at" => now()],
                ["name" => "LAIKIPIA", "created_at" => now()],
                ["name" => "LAMU", "created_at" => now()],
                ["name" => "MACHAKOS", "created_at" => now()],
                ["name" => "MAKUENI", "created_at" => now()],
                ["name" => "MANDERA", "created_at" => now()],
                ["name" => "MARSABIT", "created_at" => now()],
                ["name" => "MERU", "created_at" => now()],
                ["name" => "MIGORI", "created_at" => now()],
                ["name" => "MOMBASA", "created_at" => now()],
                ["name" => "MURANG'A", "created_at" => now()],
                ["name" => "NAIROBI", "created_at" => now()],
                ["name" => "NAKURU", "created_at" => now()],
                ["name" => "NANDI", "created_at" => now()],
                ["name" => "NAROK", "created_at" => now()],
                ["name" => "NYAMIRA", "created_at" => now()],
                ["name" => "NYANDARUA", "created_at" => now()],
                ["name" => "NYERI", "created_at" => now()],
                ["name" => "SAMBURU", "created_at" => now()],
                ["name" => "SIAYA", "created_at" => now()],
                ["name" => "TAITA TAVETA", "created_at" => now()],
                ["name" => "TANA RIVER", "created_at" => now()],
                ["name" => "THARAKA NITHI", "created_at" => now()],
                ["name" => "TRANS NZOIA", "created_at" => now()],
                ["name" => "TURKANA", "created_at" => now()],
                ["name" => "UASIN GISHU", "created_at" => now()],
                ["name" => "VIHIGA", "created_at" => now()],
                ["name" => "WAJIR", "created_at" => now()],
                ["name" => "WEST POKOT", "created_at" => now()]
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
        Schema::dropIfExists('tbl_county');
    }
}
