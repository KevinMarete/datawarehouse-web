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
                [
                    "mflcode" => 12876,
                    "name" => "Babadogo Health Centre",
                    "subcounty_id" => 1
                ],
                [
                    "mflcode" => 12889,
                    "name" => "Cana Family Life Clinic",
                    "subcounty_id" => 2
                ],
                [
                    "mflcode" => 12893,
                    "name" => "Chandaria Health Centre",
                    "subcounty_id" => 3
                ],
                [
                    "mflcode" => 12913,
                    "name" => "Dandora I Health Centre",
                    "subcounty_id" => 4
                ],
                [
                    "mflcode" => 12930,
                    "name" => "Eastleigh Health Centre",
                    "subcounty_id" => 5
                ],
                [
                    "mflcode" => 12935,
                    "name" => "6 Health Centre",
                    "subcounty_id" => 6
                ],
                [
                    "mflcode" => 12972,
                    "name" => "Huruma Lions Dispensary",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 12989,
                    "name" => "Jerusalem Clinic",
                    "subcounty_id" => 2
                ],
                [
                    "mflcode" => 12998,
                    "name" => "Kaloleni Dispensary",
                    "subcounty_id" => 2
                ],
                [
                    "mflcode" => 13003,
                    "name" => "Karen Health Centre",
                    "subcounty_id" => 8
                ],
                [
                    "mflcode" => 13009,
                    "name" => "Karura Health Centre (Kiambu Rd)",
                    "subcounty_id" => 9
                ],
                [
                    "mflcode" => 13015,
                    "name" => "Kayole I Health Centre",
                    "subcounty_id" => 6
                ],
                [
                    "mflcode" => 13029,
                    "name" => "Kibera D O Dispensary",
                    "subcounty_id" => 8
                ],
                [
                    "mflcode" => 13050,
                    "name" => "Loco Dispensary",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 13076,
                    "name" => "Mathari Hospital",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 13105,
                    "name" => "Mutuini Sub-District Hospital",
                    "subcounty_id" => 3
                ],
                [
                    "mflcode" => 13113,
                    "name" => "Nairobi South Clinic",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 13122,
                    "name" => "Ngara Health Centre (City Council of Nairobi)",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 13126,
                    "name" => "Njiru Dispensary",
                    "subcounty_id" => 4
                ],
                [
                    "mflcode" => 19308,
                    "name" => "NOSET - Maisha House VCT",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 13155,
                    "name" => "PUMWANI MAJENGO DISPENSARY-Majengo CCC",
                    "subcounty_id" => 5
                ],
                [
                    "mflcode" => 13165,
                    "name" => "Riruta Health Centre",
                    "subcounty_id" => 3
                ],
                [
                    "mflcode" => 13171,
                    "name" => "Ruai Health Centre",
                    "subcounty_id" => 4
                ],
                [
                    "mflcode" => 13210,
                    "name" => "St Joseph's Dispensary (Dagoretti)",
                    "subcounty_id" => 3
                ],
                [
                    "mflcode" => 18176,
                    "name" => "SWOP (Lang'ata)",
                    "subcounty_id" => 8
                ],
                [
                    "mflcode" => 19394,
                    "name" => "SWOP City Clinic",
                    "subcounty_id" => 7
                ],
                [
                    "mflcode" => 19719,
                    "name" => "SWOP Kawangware",
                    "subcounty_id" => 3
                ],
                [
                    "mflcode" => 19271,
                    "name" => "SWOP Korogocho",
                    "subcounty_id" => 4
                ],
                [
                    "mflcode" => 13180,
                    "name" => "SWOP Majengo",
                    "subcounty_id" => 5
                ],
                [
                    "mflcode" => 19429,
                    "name" => "SWOP Outreach Project Clinic",
                    "subcounty_id" => 6
                ],
                [
                    "mflcode" => 18896,
                    "name" => "SWOP Thika Road",
                    "subcounty_id" => 4
                ],
                [
                    "mflcode" => 13240,
                    "name" => "Umoja Health Centre",
                    "subcounty_id" => 6
                ],
                [
                    "mflcode" => 13249,
                    "name" => "Waithaka Health Centre",
                    "subcounty_id" => 3
                ]
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
        Schema::dropIfExists('tbl_facility');
        Schema::enableForeignKeyConstraints();
    }
}
