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
                [
                    "name" => "ABERDARE FOREST",
                    "county_id" => 29
                ],
                [
                    "name" => "ABERDARE FOREST",
                    "county_id" => 36
                ],
                [
                    "name" => "ABERDARE NATIONAL PARK",
                    "county_id" => 35
                ],
                [
                    "name" => "AINABKOI",
                    "county_id" => 44
                ],
                [
                    "name" => "ATHI RIVER",
                    "county_id" => 22
                ],
                [
                    "name" => "AWENDO",
                    "county_id" => 27
                ],
                [
                    "name" => "BALAMBALA",
                    "county_id" => 7
                ],
                [
                    "name" => "BANISA",
                    "county_id" => 24
                ],
                [
                    "name" => "BARINGO CENTRAL",
                    "county_id" => 1
                ],
                [
                    "name" => "BARINGO NORTH",
                    "county_id" => 1
                ],
                [
                    "name" => "BELGUT",
                    "county_id" => 12
                ],
                [
                    "name" => "BOMET CENTRAL",
                    "county_id" => 2
                ],
                [
                    "name" => "BOMET EAST",
                    "county_id" => 2
                ],
                [
                    "name" => "BONDO",
                    "county_id" => 38
                ],
                [
                    "name" => "BORABU",
                    "county_id" => 34
                ],
                [
                    "name" => "BUMULA",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNA",
                    "county_id" => 46
                ],
                [
                    "name" => "BUNGOMA CENTRAL",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNGOMA EAST",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNGOMA NORTH",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNGOMA SOUTH",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNGOMA WEST",
                    "county_id" => 3
                ],
                [
                    "name" => "BUNYALA",
                    "county_id" => 4
                ],
                [
                    "name" => "BURETI",
                    "county_id" => 12
                ],
                [
                    "name" => "BUSIA",
                    "county_id" => 4
                ],
                [
                    "name" => "BUTERE",
                    "county_id" => 11
                ],
                [
                    "name" => "BUTULA",
                    "county_id" => 4
                ],
                [
                    "name" => "BUURI EAST",
                    "county_id" => 26
                ],
                [
                    "name" => "BUURI WEST",
                    "county_id" => 26
                ],
                [
                    "name" => "CHANGAMWE",
                    "county_id" => 28
                ],
                [
                    "name" => "CHEPALUNGU",
                    "county_id" => 2
                ],
                [
                    "name" => "CHEPTAIS",
                    "county_id" => 3
                ],
                [
                    "name" => "CHESUMEI",
                    "county_id" => 32
                ],
                [
                    "name" => "CHONYI",
                    "county_id" => 14
                ],
                [
                    "name" => "DADAAB",
                    "county_id" => 7
                ],
                [
                    "name" => "DAGORETTI",
                    "county_id" => 30
                ],
                [
                    "name" => "EAST POKOT",
                    "county_id" => 1
                ],
                [
                    "name" => "ELDAS",
                    "county_id" => 46
                ],
                [
                    "name" => "EMBAKASI",
                    "county_id" => 30
                ],
                [
                    "name" => "EMBU EAST",
                    "county_id" => 6
                ],
                [
                    "name" => "EMBU NORTH",
                    "county_id" => 6
                ],
                [
                    "name" => "EMBU WEST",
                    "county_id" => 6
                ],
                [
                    "name" => "EMUHAYA",
                    "county_id" => 45
                ],
                [
                    "name" => "ENDEBESS",
                    "county_id" => 42
                ],
                [
                    "name" => "ETAGO",
                    "county_id" => 16
                ],
                [
                    "name" => "FAFI",
                    "county_id" => 7
                ],
                [
                    "name" => "GANZE",
                    "county_id" => 14
                ],
                [
                    "name" => "GARBATULLA",
                    "county_id" => 9
                ],
                [
                    "name" => "GARISSA",
                    "county_id" => 7
                ],
                [
                    "name" => "GATANGA",
                    "county_id" => 29
                ],
                [
                    "name" => "GATUNDU NORTH",
                    "county_id" => 13
                ],
                [
                    "name" => "GATUNDU SOUTH",
                    "county_id" => 13
                ],
                [
                    "name" => "GEM",
                    "county_id" => 38
                ],
                [
                    "name" => "GILGIL",
                    "county_id" => 31
                ],
                [
                    "name" => "GITHUNGURI",
                    "county_id" => 13
                ],
                [
                    "name" => "GUCHA",
                    "county_id" => 16
                ],
                [
                    "name" => "GUCHA SOUTH",
                    "county_id" => 16
                ],
                [
                    "name" => "HABASWEIN",
                    "county_id" => 46
                ],
                [
                    "name" => "HAMISI",
                    "county_id" => 45
                ],
                [
                    "name" => "HOMA BAY",
                    "county_id" => 8
                ],
                [
                    "name" => "HULUGHO",
                    "county_id" => 7
                ],
                [
                    "name" => "IGAMBANG'OMBE",
                    "county_id" => 41
                ],
                [
                    "name" => "IGEMBE CENTRAL",
                    "county_id" => 26
                ],
                [
                    "name" => "IGEMBE NORTH",
                    "county_id" => 26
                ],
                [
                    "name" => "IGEMBE SOUTH",
                    "county_id" => 26
                ],
                [
                    "name" => "IJARA",
                    "county_id" => 7
                ],
                [
                    "name" => "IKUTHA",
                    "county_id" => 18
                ],
                [
                    "name" => "IMENTI NORTH",
                    "county_id" => 26
                ],
                [
                    "name" => "IMENTI SOUTH",
                    "county_id" => 26
                ],
                [
                    "name" => "ISINYA",
                    "county_id" => 10
                ],
                [
                    "name" => "ISIOLO",
                    "county_id" => 9
                ],
                [
                    "name" => "JOMVU",
                    "county_id" => 28
                ],
                [
                    "name" => "JUJA",
                    "county_id" => 13
                ],
                [
                    "name" => "KABETE",
                    "county_id" => 13
                ],
                [
                    "name" => "KAHURO",
                    "county_id" => 29
                ],
                [
                    "name" => "KAJIADO CENTRAL",
                    "county_id" => 10
                ],
                [
                    "name" => "KAJIADO NORTH",
                    "county_id" => 10
                ],
                [
                    "name" => "KAJIADO WEST",
                    "county_id" => 10
                ],
                [
                    "name" => "KAKAMEGA CENTRAL",
                    "county_id" => 11
                ],
                [
                    "name" => "KAKAMEGA EAST",
                    "county_id" => 11
                ],
                [
                    "name" => "KAKAMEGA FOREST",
                    "county_id" => 45
                ],
                [
                    "name" => "KAKAMEGA NORTH",
                    "county_id" => 11
                ],
                [
                    "name" => "KAKAMEGA SOUTH",
                    "county_id" => 11
                ],
                [
                    "name" => "KALAMA",
                    "county_id" => 22
                ],
                [
                    "name" => "KALOLENI",
                    "county_id" => 14
                ],
                [
                    "name" => "KAMUKUNJI",
                    "county_id" => 30
                ],
                [
                    "name" => "KANDARA",
                    "county_id" => 29
                ],
                [
                    "name" => "KANGEMA",
                    "county_id" => 29
                ],
                [
                    "name" => "KANGUNDO",
                    "county_id" => 22
                ],
                [
                    "name" => "KAPSERET",
                    "county_id" => 44
                ],
                [
                    "name" => "KASARANI",
                    "county_id" => 30
                ],
                [
                    "name" => "KATHIANI",
                    "county_id" => 22
                ],
                [
                    "name" => "KATHONZWENI",
                    "county_id" => 23
                ],
                [
                    "name" => "KATULANI",
                    "county_id" => 18
                ],
                [
                    "name" => "KAUMA",
                    "county_id" => 14
                ],
                [
                    "name" => "KEIYO NORTH",
                    "county_id" => 5
                ],
                [
                    "name" => "KEIYO SOUTH",
                    "county_id" => 5
                ],
                [
                    "name" => "KENYENYA",
                    "county_id" => 16
                ],
                [
                    "name" => "KERICHO EAST",
                    "county_id" => 12
                ],
                [
                    "name" => "KESSES",
                    "county_id" => 44
                ],
                [
                    "name" => "KHWISERO",
                    "county_id" => 11
                ],
                [
                    "name" => "KIAMBAA",
                    "county_id" => 13
                ],
                [
                    "name" => "KIAMBU",
                    "county_id" => 13
                ],
                [
                    "name" => "KIBISH",
                    "county_id" => 43
                ],
                [
                    "name" => "KIBRA",
                    "county_id" => 30
                ],
                [
                    "name" => "KIBWEZI",
                    "county_id" => 23
                ],
                [
                    "name" => "KIENI EAST",
                    "county_id" => 36
                ],
                [
                    "name" => "KIENI WEST",
                    "county_id" => 36
                ],
                [
                    "name" => "KIGUMO",
                    "county_id" => 29
                ],
                [
                    "name" => "KIKUYU",
                    "county_id" => 13
                ],
                [
                    "name" => "KILIFI NORTH",
                    "county_id" => 14
                ],
                [
                    "name" => "KILIFI SOUTH",
                    "county_id" => 14
                ],
                [
                    "name" => "KILUNGU",
                    "county_id" => 23
                ],
                [
                    "name" => "KIMILILI BUNGOMA",
                    "county_id" => 3
                ],
                [
                    "name" => "KIMININI",
                    "county_id" => 42
                ],
                [
                    "name" => "KINANGO",
                    "county_id" => 19
                ],
                [
                    "name" => "KINANGOP",
                    "county_id" => 35
                ],
                [
                    "name" => "KIPIPIRI",
                    "county_id" => 35
                ],
                [
                    "name" => "KIPKELION",
                    "county_id" => 12
                ],
                [
                    "name" => "KIPKOMO",
                    "county_id" => 47
                ],
                [
                    "name" => "KIRINYAGA CENTRAL",
                    "county_id" => 15
                ],
                [
                    "name" => "KIRINYAGA EAST",
                    "county_id" => 15
                ],
                [
                    "name" => "KIRINYAGA WEST",
                    "county_id" => 15
                ],
                [
                    "name" => "KISASI",
                    "county_id" => 18
                ],
                [
                    "name" => "KISAUNI",
                    "county_id" => 28
                ],
                [
                    "name" => "KISII CENTRAL",
                    "county_id" => 16
                ],
                [
                    "name" => "KISII SOUTH",
                    "county_id" => 16
                ],
                [
                    "name" => "KISUMU CENTRAL",
                    "county_id" => 17
                ],
                [
                    "name" => "KISUMU EAST",
                    "county_id" => 17
                ],
                [
                    "name" => "KISUMU WEST",
                    "county_id" => 17
                ],
                [
                    "name" => "KITUI CENTRAL",
                    "county_id" => 18
                ],
                [
                    "name" => "KITUI WEST",
                    "county_id" => 18
                ],
                [
                    "name" => "KITUTU CENTRAL",
                    "county_id" => 16
                ],
                [
                    "name" => "KOIBATEK",
                    "county_id" => 1
                ],
                [
                    "name" => "KONOIN",
                    "county_id" => 2
                ],
                [
                    "name" => "KURESOI NORTH",
                    "county_id" => 31
                ],
                [
                    "name" => "KURESOI SOUTH",
                    "county_id" => 31
                ],
                [
                    "name" => "KURIA EAST",
                    "county_id" => 27
                ],
                [
                    "name" => "KURIA WEST",
                    "county_id" => 27
                ],
                [
                    "name" => "KUTULO",
                    "county_id" => 24
                ],
                [
                    "name" => "KWANZA",
                    "county_id" => 42
                ],
                [
                    "name" => "KYUSO",
                    "county_id" => 18
                ],
                [
                    "name" => "LAFEY",
                    "county_id" => 24
                ],
                [
                    "name" => "LAGDERA",
                    "county_id" => 7
                ],
                [
                    "name" => "LAIKIPIA CENTRAL",
                    "county_id" => 20
                ],
                [
                    "name" => "LAIKIPIA EAST",
                    "county_id" => 20
                ],
                [
                    "name" => "LAIKIPIA NORTH",
                    "county_id" => 20
                ],
                [
                    "name" => "LAIKIPIA WEST",
                    "county_id" => 20
                ],
                [
                    "name" => "LAMU EAST",
                    "county_id" => 21
                ],
                [
                    "name" => "LAMU WEST",
                    "county_id" => 21
                ],
                [
                    "name" => "LANG'ATA",
                    "county_id" => 30
                ],
                [
                    "name" => "LARI",
                    "county_id" => 13
                ],
                [
                    "name" => "LIKONI",
                    "county_id" => 28
                ],
                [
                    "name" => "LIKUYANI",
                    "county_id" => 11
                ],
                [
                    "name" => "LIMURU",
                    "county_id" => 13
                ],
                [
                    "name" => "LOIMA",
                    "county_id" => 43
                ],
                [
                    "name" => "LOITOKITOK",
                    "county_id" => 10
                ],
                [
                    "name" => "LOIYANGALANI",
                    "county_id" => 25
                ],
                [
                    "name" => "LONDIANI",
                    "county_id" => 12
                ],
                [
                    "name" => "LOWER YATTA",
                    "county_id" => 18
                ],
                [
                    "name" => "LUANDA",
                    "county_id" => 45
                ],
                [
                    "name" => "LUGARI",
                    "county_id" => 11
                ],
                [
                    "name" => "LUNGALUNGA",
                    "county_id" => 19
                ],
                [
                    "name" => "MAARA",
                    "county_id" => 41
                ],
                [
                    "name" => "MACHAKOS",
                    "county_id" => 22
                ],
                [
                    "name" => "MAGARINI",
                    "county_id" => 14
                ],
                [
                    "name" => "MAKADARA",
                    "county_id" => 30
                ],
                [
                    "name" => "MAKINDU",
                    "county_id" => 23
                ],
                [
                    "name" => "MAKUENI",
                    "county_id" => 23
                ],
                [
                    "name" => "MALINDI",
                    "county_id" => 14
                ],
                [
                    "name" => "MANDERA CENTRAL",
                    "county_id" => 24
                ],
                [
                    "name" => "MANDERA EAST",
                    "county_id" => 24
                ],
                [
                    "name" => "MANDERA NORTH",
                    "county_id" => 24
                ],
                [
                    "name" => "MANDERA WEST",
                    "county_id" => 24
                ],
                [
                    "name" => "MANGA",
                    "county_id" => 34
                ],
                [
                    "name" => "MARAKWET EAST",
                    "county_id" => 5
                ],
                [
                    "name" => "MARAKWET WEST",
                    "county_id" => 5
                ],
                [
                    "name" => "MARANI",
                    "county_id" => 16
                ],
                [
                    "name" => "MARIGAT",
                    "county_id" => 1
                ],
                [
                    "name" => "MARSABIT CENTRAL",
                    "county_id" => 25
                ],
                [
                    "name" => "MARSABIT NORTH",
                    "county_id" => 25
                ],
                [
                    "name" => "MARSABIT SOUTH",
                    "county_id" => 25
                ],
                [
                    "name" => "MASABA NORTH",
                    "county_id" => 34
                ],
                [
                    "name" => "MASABA SOUTH",
                    "county_id" => 16
                ],
                [
                    "name" => "MASHUURU",
                    "county_id" => 10
                ],
                [
                    "name" => "MASINGA",
                    "county_id" => 22
                ],
                [
                    "name" => "MATETE",
                    "county_id" => 11
                ],
                [
                    "name" => "MATHARE",
                    "county_id" => 30
                ],
                [
                    "name" => "MATHIOYA",
                    "county_id" => 29
                ],
                [
                    "name" => "MATHIRA EAST",
                    "county_id" => 36
                ],
                [
                    "name" => "MATHIRA WEST",
                    "county_id" => 36
                ],
                [
                    "name" => "MATINYANI",
                    "county_id" => 18
                ],
                [
                    "name" => "MATUGA",
                    "county_id" => 19
                ],
                [
                    "name" => "MATUNGU",
                    "county_id" => 11
                ],
                [
                    "name" => "MATUNGULU",
                    "county_id" => 22
                ],
                [
                    "name" => "MAU FOREST",
                    "county_id" => 33
                ],
                [
                    "name" => "MBEERE NORTH",
                    "county_id" => 6
                ],
                [
                    "name" => "MBEERE SOUTH",
                    "county_id" => 6
                ],
                [
                    "name" => "MBOONI EAST",
                    "county_id" => 23
                ],
                [
                    "name" => "MBOONI WEST",
                    "county_id" => 23
                ],
                [
                    "name" => "MERTI",
                    "county_id" => 9
                ],
                [
                    "name" => "MERU CENTRAL",
                    "county_id" => 26
                ],
                [
                    "name" => "MERU NATIONAL PARK",
                    "county_id" => 26
                ],
                [
                    "name" => "MERU SOUTH",
                    "county_id" => 41
                ],
                [
                    "name" => "MIGWANI",
                    "county_id" => 18
                ],
                [
                    "name" => "MIRANGINE",
                    "county_id" => 35
                ],
                [
                    "name" => "MOGOTIO",
                    "county_id" => 1
                ],
                [
                    "name" => "MOIBEN",
                    "county_id" => 44
                ],
                [
                    "name" => "MOLO",
                    "county_id" => 31
                ],
                [
                    "name" => "MOYALE",
                    "county_id" => 25
                ],
                [
                    "name" => "MSAMBWENI",
                    "county_id" => 19
                ],
                [
                    "name" => "MT ELGON",
                    "county_id" => 3
                ],
                [
                    "name" => "MT ELGON FOREST",
                    "county_id" => 3
                ],
                [
                    "name" => "MT KENYA FOREST",
                    "county_id" => 6
                ],
                [
                    "name" => "MT KENYA FOREST",
                    "county_id" => 15
                ],
                [
                    "name" => "MT KENYA FOREST",
                    "county_id" => 26
                ],
                [
                    "name" => "MT KENYA FOREST",
                    "county_id" => 36
                ],
                [
                    "name" => "MT KENYA FOREST",
                    "county_id" => 41
                ],
                [
                    "name" => "MUHORONI",
                    "county_id" => 17
                ],
                [
                    "name" => "MUKAA",
                    "county_id" => 23
                ],
                [
                    "name" => "MUKURWE INI",
                    "county_id" => 36
                ],
                [
                    "name" => "MUMIAS EAST",
                    "county_id" => 11
                ],
                [
                    "name" => "MUMIAS WEST",
                    "county_id" => 11
                ],
                [
                    "name" => "MUMONI",
                    "county_id" => 18
                ],
                [
                    "name" => "MURANG'A EAST",
                    "county_id" => 29
                ],
                [
                    "name" => "MURANG'A SOUTH",
                    "county_id" => 29
                ],
                [
                    "name" => "MUTITU",
                    "county_id" => 18
                ],
                [
                    "name" => "MUTITU NORTH",
                    "county_id" => 18
                ],
                [
                    "name" => "MUTOMO",
                    "county_id" => 18
                ],
                [
                    "name" => "MVITA",
                    "county_id" => 28
                ],
                [
                    "name" => "MWALA",
                    "county_id" => 22
                ],
                [
                    "name" => "MWATATE",
                    "county_id" => 39
                ],
                [
                    "name" => "MWEA EAST",
                    "county_id" => 15
                ],
                [
                    "name" => "MWEA WEST",
                    "county_id" => 15
                ],
                [
                    "name" => "MWINGI CENTRAL",
                    "county_id" => 18
                ],
                [
                    "name" => "MWINGI EAST",
                    "county_id" => 18
                ],
                [
                    "name" => "WESTLANDS",
                    "county_id" => 30
                ],
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
