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
                    "mflcode" => 13023,
                    "name" => "KENYATTA NATIONAL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13080,
                    "name" => "MBAGATHI DISTRICT HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13105,
                    "name" => "MUTUINI SUB-DISTRICT HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13086,
                    "name" => "MELCHIZEDEK HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13091,
                    "name" => "MIDHILL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13165,
                    "name" => "RIRUTA HEALTH CENTRE",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13249,
                    "name" => "WAITHAKA HEALTH CENTRE",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13036,
                    "name" => "KIVULI DISPENSARY(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13135,
                    "name" => "ORTHODOX DISPENSARY(ORTHODOX CHURCH)",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13103,
                    "name" => "MUTEITHANIA NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13089,
                    "name" => "MERCY MISSION NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 12893,
                    "name" => "CHANDARIA DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13213,
                    "name" => "ST LUKES NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13129,
                    "name" => "NYINA WA MUMBI CLINIC(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13212,
                    "name" => "ST JUDES NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13159,
                    "name" => "RAY OF HOPE NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13200,
                    "name" => "ST CATHERINE NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13123,
                    "name" => "NGONG ROAD DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13119,
                    "name" => "NASCOP VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13019,
                    "name" => "KEMRI DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 16803,
                    "name" => "GATINA DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 12995,
                    "name" => "KABIRO MEDICAL CENTER",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13238,
                    "name" => "TRINITY MEDICAL CARE",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13152,
                    "name" => "PROVIDENCE VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 12909,
                    "name" => "DAGORETTI APPROVED DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13259,
                    "name" => "WOODLEY CLINIC",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 12864,
                    "name" => "ABANDONED CHILD DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13188,
                    "name" => "SOKONI ARCADE VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 16801,
                    "name" => "AL QADIR DISPENSARY(ISLAMIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13210,
                    "name" => "ST JOSEPH DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13025,
                    "name" => "KESHA VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 16802,
                    "name" => "JONALIFA MEDICAL CARE",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13087,
                    "name" => "FORCES MEMMORIAL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13046,
                    "name" => "LEA TOTO CLINIC(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13235,
                    "name" => "TEACHERS SERVICE COMMISION VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mflcode" => 13056,
                    "name" => "MAKADARA HEALTH CENTRE",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12988,
                    "name" => "JERICHO DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12969,
                    "name" => "HONO CLINC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13069,
                    "name" => "MARINGO CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13132,
                    "name" => "OFAFA 1 CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12998,
                    "name" => "KALOLENI DISPENSRY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13051,
                    "name" => "LOCO DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13161,
                    "name" => "NAIROBI REMAND PRISON DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13081,
                    "name" => "MBOTEA CINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13059,
                    "name" => "LUNGALUNGA DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13168,
                    "name" => "RAILWAY TRAINING INSTITUTE CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13097,
                    "name" => "MINSTRY OF PUBLIC WORKS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13144,
                    "name" => "SOUTH B POLICE BAND DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12999,
                    "name" => "KALOLENI HEALTH SERVICES CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13040,
                    "name" => "LAND MAWECLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12889,
                    "name" => "CANA FAMILY LIFE CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12904,
                    "name" => "COPTIC CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13100,
                    "name" => "CRESCENT MEDICAL MUKURU CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13074,
                    "name" => "THE MATER HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12982,
                    "name" => "MARY IMMACULATE SISTERS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12943,
                    "name" => "FLACK CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13064,
                    "name" => "MARIAKANI LCOTTAGE HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 18005,
                    "name" => "SOUTH B HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12984,
                    "name" => "JAMAA MISSION HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13090,
                    "name" => "METROPOLITAN HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12868,
                    "name" => "AGA KHAN MEDICAL CLINIC BURUBURU",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13185,
                    "name" => "SHEPHERDS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12925,
                    "name" => "DR. MOHAMOUD CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 13057,
                    "name" => "MAKADARA MERCY SISTERS DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mflcode" => 12871,
                    "name" => "APTC HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12869,
                    "name" => "ALICE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12873,
                    "name" => "ASKI MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12888,
                    "name" => "BURUBURU FRIENDS CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12958,
                    "name" => "CONE HEALTH SERVICES CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12896,
                    "name" => "CIDI  KAYOLE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12897,
                    "name" => "CIDI MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12908,
                    "name" => "DEBLIU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12917,
                    "name" => "DIWOPA HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12920,
                    "name" => "EDARP DONHOLM CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12935,
                    "name" => "EMBAKASI HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12962,
                    "name" => "GSU HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12949,
                    "name" => "GENESARET MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12952,
                    "name" => "GERTRUDES DONHOLM CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 18395,
                    "name" => "GERTRUDE KOMAROCK CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12967,
                    "name" => "HAKATI MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 17684,
                    "name" => "HOPE  WORLD WIDE MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12978,
                    "name" => "HURUMA PIPELINE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 17685,
                    "name" => "IMARA HEALTH CARE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12981,
                    "name" => "IMARA MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12991,
                    "name" => "JKIA DISPENSARY",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13014,
                    "name" => "KAYOLE HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13015,
                    "name" => "KAYOLE I HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13191,
                    "name" => "KAYOLE SOWETO EDARP CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13026,
                    "name" => "KAYOLE II SUB DISTRICT HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13002,
                    "name" => "KAPU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13038,
                    "name" => "KOMAROC MODERN MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13063,
                    "name" => "MARIA MATERNITY NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13076,
                    "name" => "MAYFLOWER CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13173,
                    "name" => "MUKURU REUBEN CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13142,
                    "name" => "PINE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12971,
                    "name" => "PROVIDE MUTIDWA CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13151,
                    "name" => "PROVIDE KAYOLE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13198,
                    "name" => "SAINT BEGSON  HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13211,
                    "name" => "SAINT JUDE MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13215,
                    "name" => "SAINT MARY EMBAKASI CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13222,
                    "name" => "SAINT PATRICK CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12228,
                    "name" => "SAINT THOMAS MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13240,
                    "name" => "UMOJA HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13241,
                    "name" => "UMOJA HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13247,
                    "name" => "VICTORY HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 13101,
                    "name" => "MMM MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mflcode" => 12879,
                    "name" => "BAHATI HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12930,
                    "name" => "EASTLEIGH HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13155,
                    "name" => "PUMWANI MAJENGO DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13156,
                    "name" => "PUMWANI MATERNITY HOSPITAL",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13095,
                    "name" => "MOI AIR BASE HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13230,
                    "name" => "ST VINCENT CLINIC EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13207,
                    "name" => "ST JOSEPH  CLINIC EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13189,
                    "name" => "SOS BURUBURU CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13072,
                    "name" => "MARY IMMACULATE DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12989,
                    "name" => "JERUSALEM CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12865,
                    "name" => "BAHATI CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13184,
                    "name" => "SHAURI MOYO CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12883,
                    "name" => "BIAFRA LION CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13104,
                    "name" => "MUTHURWA CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13096,
                    "name" => "MOTHER&CHILD NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13068,
                    "name" => "MARIE STOPES  NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12941,
                    "name" => "AFWANI NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13183,
                    "name" => "FAMILY LIFE PROMOTION & SERVICES CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13260,
                    "name" => "SHAURI MOYO BAPTIST VCT",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12921,
                    "name" => "WOODSTREET NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13034,
                    "name" => "DORKCARE NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13055,
                    "name" => "ST JOSEPH NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12933,
                    "name" => "MADINA NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13225,
                    "name" => "EDNA CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12884,
                    "name" => "ST TERESA DISPENSARY (CATHOLIC)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12916,
                    "name" => "BIAFRA MEDICAL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13077,
                    "name" => "DIANI CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12997,
                    "name" => "MATHARE NORTH HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12876,
                    "name" => "KAHAWA WEST  HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13006,
                    "name" => "KASARANI MATERNITY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13010,
                    "name" => "KARIOBANGI DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13153,
                    "name" => "KASARANI DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13000,
                    "name" => "PRISON STAFF TRAINING DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13130,
                    "name" => "KAMITI PRISON HOSPITAL",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12963,
                    "name" => "NATIONAL YOUTH SERVICES DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13172,
                    "name" => "GENERAL SERVICES UNIT DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13160,
                    "name" => "RUARAKA CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13150,
                    "name" => "REDEEMED GOSPEL CHURCH HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13203,
                    "name" => "PROVIDE INTERNATIONAL KOROGOCHO HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12986,
                    "name" => "ST FRANCIS COMMUNITY HOSPITAL",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13011,
                    "name" => "JAHMII MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12877,
                    "name" => "KASARANI MATERNITY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13012,
                    "name" => "BABADOGO MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13070,
                    "name" => "KASARANI MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12996,
                    "name" => "MARURA NURSING HOME",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13024,
                    "name" => "KAHAWA GARISON HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12875,
                    "name" => "KENYATTA UNIVERSITY HEALTH SERVICES",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12881,
                    "name" => "BABADOGO EARDAP CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12906,
                    "name" => "BARAKA MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13045,
                    "name" => "CORNERSTONE VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13071,
                    "name" => "LEA TOTO KARIOBANGI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12902,
                    "name" => "MARURUI HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12955,
                    "name" => "COMPASIONATE VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12895,
                    "name" => "GIOVANNA DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12863,
                    "name" => "CHRISTIAN AID HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13125,
                    "name" => "AAR THIKA ROAD CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12957,
                    "name" => "NIMOLI MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13022,
                    "name" => "GITHURAI VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13020,
                    "name" => "KENYA UTALII DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12931,
                    "name" => "KENYA NETWORK WOMEN WITH AIDS CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13127,
                    "name" => "EDEN DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12862,
                    "name" => "NATIONAL SECURITY INTELIGENCE SERVICE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13030,
                    "name" => "AAR KARIOBANGI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13033,
                    "name" => "KIBERA SOUTH (MSF BELGIUM) DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13035,
                    "name" => "KIKOSHEP MUGUMOINI DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 17384,
                    "name" => "KISEMBO DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13058,
                    "name" => "LANG'ATA COMPREHENSIVE MEDICAL SERVICE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13061,
                    "name" => "MAKINA CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 16167,
                    "name" => "MARIA DOMINICA DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13088,
                    "name" => "MARIE STOPES CLINIC (LANGATA)",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13114,
                    "name" => "MERCILLIN AFYA CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 17456,
                    "name" => "NAIROBI WEST CHIDREN DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 17394,
                    "name" => "NEEMA YA YESU CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13131,
                    "name" => "WEMA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 16168,
                    "name" => "NYUMBANI DIAGNOSTIC LABORATORY AND MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13178,
                    "name" => "REVIVAL HOME BASED CARE CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13179,
                    "name" => "SAOLA MATERNITY AND NURSING HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13186,
                    "name" => "SENYE DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13216,
                    "name" => "SILANGA (MSF BELGIUM) DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13221,
                    "name" => "ST. MARY'S MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13234,
                    "name" => "ST. ODILIA'S DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13245,
                    "name" => "TABITHA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12891,
                    "name" => "USHIRIKA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12894,
                    "name" => "CAROLINA FOR KIBERA VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12907,
                    "name" => "CHEMI CHEMI DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12929,
                    "name" => "COTOLENGO HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12942,
                    "name" => "DREAMS CENTER DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12944,
                    "name" => "FHOK HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12945,
                    "name" => "FREPALS COMMUNITY NURSING HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12948,
                    "name" => "FUTURE AGE MEDICAL SERVICES",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12953,
                    "name" => "GATWIKERA (MSF BELGIUM) MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 17393,
                    "name" => "GETRUDES CLINIC DISPENSARY (NAIROBI WEST)",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13028,
                    "name" => "HUDUMA HEALTH CENTER",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13029,
                    "name" => "KIBERA COMMUNITY HEALTH CENTRE - AMREF",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13044,
                    "name" => "KIBERA D.O. DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13116,
                    "name" => "LANGATA WOMEN PRISON DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13239,
                    "name" => "NAIROBI WEST MEN'S PRISON DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12886,
                    "name" => "UHURU CAMP DISPENSARY (O.P. ADMIN POLICE)",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12919,
                    "name" => "BOMAS OF KENYA DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13099,
                    "name" => "DOG UNIT DISPENSARY (O.P. KENYA POLICE)",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12990,
                    "name" => "DSC KAREN DISPENSARY (ARMED FORCES)",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13003,
                    "name" => "JINNAH AVE CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13018,
                    "name" => "KAREN HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13041,
                    "name" => "KCCT DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13043,
                    "name" => "LANGATA HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13042,
                    "name" => "7KR MRS HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13109,
                    "name" => "LANGATA HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13112,
                    "name" => "NAIROBI EQUATOR HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13115,
                    "name" => "NAIROBI SOUTH C MEDICAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13218,
                    "name" => "NAIROBI WEST HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13004,
                    "name" => "ST MARY'S MISSION HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13032,
                    "name" => "KAREN HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13048,
                    "name" => "KIKOSHEP K VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13054,
                    "name" => "LEA TOTO KIBERA",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 13262,
                    "name" => "MADARAKA VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 17455,
                    "name" => "ZINDUKA CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12912,
                    "name" => "MTAANI VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mflcode" => 12913,
                    "name" => "DANDORA II HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13126,
                    "name" => "DANDORA 1 DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13171,
                    "name" => "NJIRU DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 17434,
                    "name" => "RUAI DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12911,
                    "name" => "KARIOBANGI SOUTH DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 17548,
                    "name" => "EDARP DANDORA CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13169,
                    "name" => "EDARP NJIRU CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13047,
                    "name" => "EDARP RUAI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 12887,
                    "name" => "LEA TOTO KARIOBANGI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13176,
                    "name" => "BROTHER ANDRE CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13148,
                    "name" => "SAMARITAN MEDICAL CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13193,
                    "name" => "PROVIDE INTERNATIONAL CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mflcode" => 13121,
                    "name" => "SPECIAL  TREATMENT CENTRE(CASINO)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13163,
                    "name" => "NGAIRA DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13039,
                    "name" => "RHODES CHEST CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13122,
                    "name" => "LAGOS ROAD DISPENSARY(STAFF)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13138,
                    "name" => "NGARA HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13007,
                    "name" => "PANGANI CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12974,
                    "name" => "KARIOKOR CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13075,
                    "name" => "MATHARI MENTAL HOSPITAL",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12973,
                    "name" => "HURUMA LIONS DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12972,
                    "name" => "MATHARE 3A EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12976,
                    "name" => "HURUMA EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13199,
                    "name" => "HURUMA NCCK",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13139,
                    "name" => "HURUMA NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13158,
                    "name" => "ST BRIDGETS CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12940,
                    "name" => "PARKROAD NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12939,
                    "name" => "RADIANT HOSPITAL",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12965,
                    "name" => "FAMILY HEATH OPTIONS  RIBEIRO",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13243,
                    "name" => "FAMILY HEALTH OPTIONS  PHOENIX",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13066,
                    "name" => "GURUNANAK HOSPITAL",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13065,
                    "name" => "UPENDO DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12899,
                    "name" => "MARIE STOPES PANGANI",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13250,
                    "name" => "MARIE STOPES KENCOM",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13111,
                    "name" => "CRESCENT MEDICAL AID JAMIA",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13237,
                    "name" => "WAKIBE MEDICAL CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13021,
                    "name" => "NAIROBI OUTPATIENT CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13187,
                    "name" => "TRANSCOM MEDICAL CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13092,
                    "name" => "KENYA AIRWAYS CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13174,
                    "name" => "SINGLE MOTHERS VCT(SMAK)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13107,
                    "name" => "MINISTRY OF EDUC VCT(MOEST)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13206,
                    "name" => "RURAL AID VCT",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12901,
                    "name" => "NAIOTH VCT",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13031,
                    "name" => "ST JOHNS AMBULANCE VCT",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13233,
                    "name" => "COMMUNITY HEALTH FOUND",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13180,
                    "name" => "KENYA INSTITUTE OF EDUCATION/KENYA ASSOCIATION OF COUNSELLING(KIE/KAPC)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13108,
                    "name" => "SUPREME COUNCIL OF MUSLIMS(SUPKEM)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13078,
                    "name" => "SEX WORKERS OPERATION PROGRAME(SWOP)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12861,
                    "name" => "DEAF LIVERPOOL",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12882,
                    "name" => "MATHARE POLICE DEPOT",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12890,
                    "name" => "AFRICAN AIR RESCUE CITY CENTRE(AAR)",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12946,
                    "name" => "BETHEL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 13083,
                    "name" => "CANAAN MEDICAL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 16796,
                    "name" => "GAIMU MEDICAL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12867,
                    "name" => "MEDICARE MEDICAL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mflcode" => 12870,
                    "name" => "AAR SARIT CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12874,
                    "name" => "AGA KHAN HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12898,
                    "name" => "AMURT HEALTH CENTRE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12905,
                    "name" => "AVENUE NURSING  HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12918,
                    "name" => "CLINITEC DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12922,
                    "name" => "COPTIC HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12924,
                    "name" => "DOD MRS DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12926,
                    "name" => "DR.GACHARE MEDICAL CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12927,
                    "name" => "DR.AZIZ MOHAMMED MEDICAL CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12928,
                    "name" => "DR.MONTET MEDICAL CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12950,
                    "name" => "DR.MUASYA MEDICAL CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12951,
                    "name" => "DR.WERE MEDICAL CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12966,
                    "name" => "GERTRUDES HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12968,
                    "name" => "GERTRUDES OTHAYA ROAD DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12979,
                    "name" => "GYNAPAED DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12993,
                    "name" => "HIGHRIDGE HEALTH CENTRE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 12994,
                    "name" => "I R IRAN DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13001,
                    "name" => "KABETE APPROVED DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13009,
                    "name" => "KABETE BARRACKS DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13013,
                    "name" => "KANGEMI HEALTH CENTRE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 16169,
                    "name" => "KARURA HEALTH CENTRE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 16800,
                    "name" => "KENYA AIDS VACCINE INITIATIVE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13049,
                    "name" => "LADY NORTHEY DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13050,
                    "name" => "LEA TOTO CLINIC (WESTLANDS)",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13052,
                    "name" => "LIANAS CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13062,
                    "name" => "LIVERPOOL VCT",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13067,
                    "name" => "LOWER KABETE DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13093,
                    "name" => "MARIA IMMACULATA HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13098,
                    "name" => "MARIE STOPES CLINIC WESTLANDS",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13110,
                    "name" => "MJI WA HURUMA DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13117,
                    "name" => "MP SHAH HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 16795,
                    "name" => "NAIROBI HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13120,
                    "name" => "NAIROBI WOMEN'S HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13137,
                    "name" => "NAIROBI WOMEN'S HOSPITAL ADAMS",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13194,
                    "name" => "NEW LIFE HOME(CHILDREN'S HOME WESTLANDS)",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13201,
                    "name" => "PADENS CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13209,
                    "name" => "NATIONAL SPINAL INJURY HOSPITAL",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13231,
                    "name" => "ST.FLORENCE MEDICAL CARE HEALTH CENTRE",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13232,
                    "name" => "ST.JOSEPH THE WORKER DISPENSARY",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13242,
                    "name" => "STATE HOUSE CLINIC",
                    "subcounty_id" => 237
                ],
                [
                    "mflcode" => 13258,
                    "name" => "STATE HOUSE DISPENSARY",
                    "subcounty_id" => 237
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
