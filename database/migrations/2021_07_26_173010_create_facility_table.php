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
                    "mfl_code" => 13023,
                    "facility_name" => "KENYATTA NATIONAL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13080,
                    "facility_name" => "MBAGATHI DISTRICT HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13105,
                    "facility_name" => "MUTUINI SUB-DISTRICT HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13086,
                    "facility_name" => "MELCHIZEDEK HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13091,
                    "facility_name" => "MIDHILL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13165,
                    "facility_name" => "RIRUTA HEALTH CENTRE",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13249,
                    "facility_name" => "WAITHAKA HEALTH CENTRE",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13036,
                    "facility_name" => "KIVULI DISPENSARY(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13135,
                    "facility_name" => "ORTHODOX DISPENSARY(ORTHODOX CHURCH)",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13103,
                    "facility_name" => "MUTEITHANIA NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13089,
                    "facility_name" => "MERCY MISSION NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 12893,
                    "facility_name" => "CHANDARIA DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13213,
                    "facility_name" => "ST LUKES NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13129,
                    "facility_name" => "NYINA WA MUMBI CLINIC(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13212,
                    "facility_name" => "ST JUDES NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13159,
                    "facility_name" => "RAY OF HOPE NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13200,
                    "facility_name" => "ST CATHERINE NURSING HOME",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13123,
                    "facility_name" => "NGONG ROAD DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13119,
                    "facility_name" => "NASCOP VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13019,
                    "facility_name" => "KEMRI DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 16803,
                    "facility_name" => "GATINA DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 12995,
                    "facility_name" => "KABIRO MEDICAL CENTER",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13238,
                    "facility_name" => "TRINITY MEDICAL CARE",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13152,
                    "facility_name" => "PROVIDENCE VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 12909,
                    "facility_name" => "DAGORETTI APPROVED DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13259,
                    "facility_name" => "WOODLEY CLINIC",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 12864,
                    "facility_name" => "ABANDONED CHILD DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13188,
                    "facility_name" => "SOKONI ARCADE VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 16801,
                    "facility_name" => "AL QADIR DISPENSARY(ISLAMIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13210,
                    "facility_name" => "ST JOSEPH DISPENSARY",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13025,
                    "facility_name" => "KESHA VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 16802,
                    "facility_name" => "JONALIFA MEDICAL CARE",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13087,
                    "facility_name" => "FORCES MEMMORIAL HOSPITAL",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13046,
                    "facility_name" => "LEA TOTO CLINIC(CATHOLIC)",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13235,
                    "facility_name" => "TEACHERS SERVICE COMMISION VCT",
                    "subcounty_id" => 36
                ],
                [
                    "mfl_code" => 13056,
                    "facility_name" => "MAKADARA HEALTH CENTRE",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12988,
                    "facility_name" => "JERICHO DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12969,
                    "facility_name" => "HONO CLINC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13069,
                    "facility_name" => "MARINGO CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13132,
                    "facility_name" => "OFAFA 1 CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12998,
                    "facility_name" => "KALOLENI DISPENSRY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13051,
                    "facility_name" => "LOCO DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13161,
                    "facility_name" => "NAIROBI REMAND PRISON DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13081,
                    "facility_name" => "MBOTEA CINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13059,
                    "facility_name" => "LUNGALUNGA DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13168,
                    "facility_name" => "RAILWAY TRAINING INSTITUTE CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13097,
                    "facility_name" => "MINSTRY OF PUBLIC WORKS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13144,
                    "facility_name" => "SOUTH B POLICE BAND DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12999,
                    "facility_name" => "KALOLENI HEALTH SERVICES CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13040,
                    "facility_name" => "LAND MAWECLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12889,
                    "facility_name" => "CANA FAMILY LIFE CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12904,
                    "facility_name" => "COPTIC CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13100,
                    "facility_name" => "CRESCENT MEDICAL MUKURU CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13074,
                    "facility_name" => "THE MATER HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12982,
                    "facility_name" => "MARY IMMACULATE SISTERS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12943,
                    "facility_name" => "FLACK CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13064,
                    "facility_name" => "MARIAKANI LCOTTAGE HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13064,
                    "facility_name" => "SOUTH B HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12984,
                    "facility_name" => "JAMAA MISSION HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13090,
                    "facility_name" => "METROPOLITAN HOSPITAL",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12868,
                    "facility_name" => "AGA KHAN MEDICAL CLINIC BURUBURU",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13185,
                    "facility_name" => "SHEPHERDS CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12925,
                    "facility_name" => "DR. MOHAMOUD CLINIC",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 13057,
                    "facility_name" => "MAKADARA MERCY SISTERS DISPENSARY",
                    "subcounty_id" => 167
                ],
                [
                    "mfl_code" => 12871,
                    "facility_name" => "APTC HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12869,
                    "facility_name" => "ALICE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12873,
                    "facility_name" => "ASKI MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12888,
                    "facility_name" => "BURUBURU FRIENDS CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12958,
                    "facility_name" => "CONE HEALTH SERVICES CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12896,
                    "facility_name" => "CIDI  KAYOLE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12897,
                    "facility_name" => "CIDI MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12908,
                    "facility_name" => "DEBLIU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12917,
                    "facility_name" => "DIWOPA HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12920,
                    "facility_name" => "EDARP DONHOLM CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12935,
                    "facility_name" => "EMBAKASI HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12962,
                    "facility_name" => "GSU HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12949,
                    "facility_name" => "GENESARET MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12952,
                    "facility_name" => "GERTRUDES DONHOLM CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12952,
                    "facility_name" => "GERTRUDE KOMAROCK CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12967,
                    "facility_name" => "HAKATI MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12971,
                    "facility_name" => "HOPE  WORLD WIDE MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12978,
                    "facility_name" => "HURUMA PIPELINE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12981,
                    "facility_name" => "IMARA HEALTH CARE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12981,
                    "facility_name" => "IMARA MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12991,
                    "facility_name" => "JKIA DISPENSARY",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13014,
                    "facility_name" => "KAYOLE HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13015,
                    "facility_name" => "KAYOLE I HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13191,
                    "facility_name" => "KAYOLE SOWETO EDARP CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13026,
                    "facility_name" => "KAYOLE II SUB DISTRICT HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13002,
                    "facility_name" => "KAPU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13038,
                    "facility_name" => "KOMAROC MODERN MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13063,
                    "facility_name" => "MARIA MATERNITY NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13076,
                    "facility_name" => "MAYFLOWER CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13173,
                    "facility_name" => "MUKURU REUBEN CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13142,
                    "facility_name" => "PINE NURSING HOME",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12971,
                    "facility_name" => "PROVIDE MUTIDWA CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13151,
                    "facility_name" => "PROVIDE KAYOLE CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13198,
                    "facility_name" => "SAINT BEGSON  HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13211,
                    "facility_name" => "SAINT JUDE MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13215,
                    "facility_name" => "SAINT MARY EMBAKASI CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13222,
                    "facility_name" => "SAINT PATRICK CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12228,
                    "facility_name" => "SAINT THOMAS MEDICAL CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13240,
                    "facility_name" => "UMOJA HEALTH CENTRE",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13241,
                    "facility_name" => "UMOJA HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13247,
                    "facility_name" => "VICTORY HOSPITAL",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 13101,
                    "facility_name" => "MMM MUKURU CLINIC",
                    "subcounty_id" => 39
                ],
                [
                    "mfl_code" => 12879,
                    "facility_name" => "BAHATI HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12930,
                    "facility_name" => "EASTLEIGH HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13155,
                    "facility_name" => "PUMWANI MAJENGO DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13156,
                    "facility_name" => "PUMWANI MATERNITY HOSPITAL",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13095,
                    "facility_name" => "MOI AIR BASE HEALTH CENTRE",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13230,
                    "facility_name" => "ST VINCENT CLINIC EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13207,
                    "facility_name" => "ST JOSEPH  CLINIC EDARP",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13189,
                    "facility_name" => "SOS BURUBURU CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13072,
                    "facility_name" => "MARY IMMACULATE DISPENSARY",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12989,
                    "facility_name" => "JERUSALEM CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12865,
                    "facility_name" => "BAHATI CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13184,
                    "facility_name" => "SHAURI MOYO CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12883,
                    "facility_name" => "BIAFRA LION CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13104,
                    "facility_name" => "MUTHURWA CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13096,
                    "facility_name" => "MOTHER&CHILD NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13068,
                    "facility_name" => "MARIE STOPES  NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12865,
                    "facility_name" => "AFWANI NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12941,
                    "facility_name" => "FAMILY LIFE PROMOTION & SERVICES CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13183,
                    "facility_name" => "SHAURI MOYO BAPTIST VCT",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13260,
                    "facility_name" => "WOODSTREET NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12921,
                    "facility_name" => "DORKCARE NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13034,
                    "facility_name" => "ST JOSEPH NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13055,
                    "facility_name" => "MADINA NURSING HOME",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12933,
                    "facility_name" => "EDNA CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13225,
                    "facility_name" => "ST TERESA DISPENSARY (CATHOLIC)",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12884,
                    "facility_name" => "BIAFRA MEDICAL CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 12916,
                    "facility_name" => "DIANI CLINIC",
                    "subcounty_id" => 86
                ],
                [
                    "mfl_code" => 13077,
                    "facility_name" => "MATHARE NORTH HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12997,
                    "facility_name" => "KAHAWA WEST  HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12876,
                    "facility_name" => "KASARANI MATERNITY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13006,
                    "facility_name" => "KARIOBANGI DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13010,
                    "facility_name" => "KASARANI DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13153,
                    "facility_name" => "PRISON STAFF TRAINING DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13000,
                    "facility_name" => "KAMITI PRISON HOSPITAL",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13130,
                    "facility_name" => "NATIONAL YOUTH SERVICES DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12963,
                    "facility_name" => "GENERAL SERVICES UNIT DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13172,
                    "facility_name" => "RUARAKA CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13160,
                    "facility_name" => "REDEEMED GOSPEL CHURCH HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13150,
                    "facility_name" => "PROVIDE INTERNATIONAL KOROGOCHO HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13203,
                    "facility_name" => "ST FRANCIS COMMUNITY HOSPITAL",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12986,
                    "facility_name" => "JAHMII MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13011,
                    "facility_name" => "KASARANI MATERNITY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12877,
                    "facility_name" => "BABADOGO MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13012,
                    "facility_name" => "KASARANI MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13070,
                    "facility_name" => "MARURA NURSING HOME",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12996,
                    "facility_name" => "KAHAWA GARISON HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13024,
                    "facility_name" => "KENYATTA UNIVERSITY HEALTH SERVICES",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12875,
                    "facility_name" => "BABADOGO EARDAP CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12881,
                    "facility_name" => "BARAKA MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12906,
                    "facility_name" => "CORNERSTONE VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13045,
                    "facility_name" => "LEA TOTO KARIOBANGI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13071,
                    "facility_name" => "MARURUI HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12902,
                    "facility_name" => "COMPASIONATE VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12955,
                    "facility_name" => "GIOVANNA DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12895,
                    "facility_name" => "CHRISTIAN AID HEALTH CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12863,
                    "facility_name" => "AAR THIKA ROAD CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13125,
                    "facility_name" => "NIMOLI MEDICAL CENTRE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12957,
                    "facility_name" => "GITHURAI VCT",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13022,
                    "facility_name" => "KENYA UTALII DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13020,
                    "facility_name" => "KENYA NETWORK WOMEN WITH AIDS CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12931,
                    "facility_name" => "EDEN DISPENSARY",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13127,
                    "facility_name" => "NATIONAL SECURITY INTELIGENCE SERVICE",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 12862,
                    "facility_name" => "AAR KARIOBANGI CLINIC",
                    "subcounty_id" => 91
                ],
                [
                    "mfl_code" => 13030,
                    "facility_name" => "KIBERA SOUTH (MSF BELGIUM) DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13033,
                    "facility_name" => "KIKOSHEP MUGUMOINI DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13035,
                    "facility_name" => "KISEMBO DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 17384,
                    "facility_name" => "LANG'ATA COMPREHENSIVE MEDICAL SERVICE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13058,
                    "facility_name" => "MAKINA CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13061,
                    "facility_name" => "MARIA DOMINICA DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 16167,
                    "facility_name" => "MARIE STOPES CLINIC (LANGATA)",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13088,
                    "facility_name" => "MERCILLIN AFYA CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13114,
                    "facility_name" => "NAIROBI WEST CHIDREN DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 17456,
                    "facility_name" => "NEEMA YA YESU CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 17394,
                    "facility_name" => "WEMA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13131,
                    "facility_name" => "NYUMBANI DIAGNOSTIC LABORATORY AND MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 16168,
                    "facility_name" => "REVIVAL HOME BASED CARE CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13178,
                    "facility_name" => "SAOLA MATERNITY AND NURSING HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13179,
                    "facility_name" => "SENYE DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13186,
                    "facility_name" => "SILANGA (MSF BELGIUM) DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13216,
                    "facility_name" => "ST. MARY'S MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13221,
                    "facility_name" => "ST. ODILIA'S DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13234,
                    "facility_name" => "TABITHA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13245,
                    "facility_name" => "USHIRIKA MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12891,
                    "facility_name" => "CAROLINA FOR KIBERA VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12894,
                    "facility_name" => "CHEMI CHEMI DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12907,
                    "facility_name" => "COTOLENGO HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12929,
                    "facility_name" => "DREAMS CENTER DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12942,
                    "facility_name" => "FHOK HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12944,
                    "facility_name" => "FREPALS COMMUNITY NURSING HOME",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12945,
                    "facility_name" => "FUTURE AGE MEDICAL SERVICES",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12948,
                    "facility_name" => "GATWIKERA (MSF BELGIUM) MEDICAL CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12953,
                    "facility_name" => "GETRUDES CLINIC DISPENSARY (NAIROBI WEST)",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 17393,
                    "facility_name" => "HUDUMA HEALTH CENTER",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13028,
                    "facility_name" => "KIBERA COMMUNITY HEALTH CENTRE - AMREF",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13029,
                    "facility_name" => "KIBERA D.O. DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13044,
                    "facility_name" => "LANGATA WOMEN PRISON DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13116,
                    "facility_name" => "NAIROBI WEST MEN'S PRISON DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13239,
                    "facility_name" => "UHURU CAMP DISPENSARY (O.P. ADMIN POLICE)",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12886,
                    "facility_name" => "BOMAS OF KENYA DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12919,
                    "facility_name" => "DOG UNIT DISPENSARY (O.P. KENYA POLICE)",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13099,
                    "facility_name" => "DSC KAREN DISPENSARY (ARMED FORCES)",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12990,
                    "facility_name" => "JINNAH AVE CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13003,
                    "facility_name" => "KAREN HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13018,
                    "facility_name" => "KCCT DISPENSARY",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13041,
                    "facility_name" => "LANGATA HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13043,
                    "facility_name" => "7KR MRS HEALTH CENTRE",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13042,
                    "facility_name" => "LANGATA HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13109,
                    "facility_name" => "NAIROBI EQUATOR HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13112,
                    "facility_name" => "NAIROBI SOUTH C MEDICAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13115,
                    "facility_name" => "NAIROBI WEST HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13218,
                    "facility_name" => "ST MARY'S MISSION HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13004,
                    "facility_name" => "KAREN HOSPITAL",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13032,
                    "facility_name" => "KIKOSHEP K VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13048,
                    "facility_name" => "LEA TOTO KIBERA",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13054,
                    "facility_name" => "MADARAKA VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 13262,
                    "facility_name" => "ZINDUKA CLINIC",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 17455,
                    "facility_name" => "MTAANI VCT",
                    "subcounty_id" => 151
                ],
                [
                    "mfl_code" => 12912,
                    "facility_name" => "DANDORA II HEALTH CENTRE",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 12913,
                    "facility_name" => "DANDORA 1 DISPENSARY",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13126,
                    "facility_name" => "NJIRU DISPENSARY",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13171,
                    "facility_name" => "RUAI DISPENSARY",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 17434,
                    "facility_name" => "KARIOBANGI SOUTH DISPENSARY",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 12911,
                    "facility_name" => "EDARP DANDORA CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 17548,
                    "facility_name" => "EDARP NJIRU CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13169,
                    "facility_name" => "EDARP RUAI CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13047,
                    "facility_name" => "LEA TOTO KARIOBANGI CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 12887,
                    "facility_name" => "BROTHER ANDRE CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13176,
                    "facility_name" => "SAMARITAN MEDICAL CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13148,
                    "facility_name" => "PROVIDE INTERNATIONAL CLINIC",
                    "subcounty_id" => 252
                ],
                [
                    "mfl_code" => 13193,
                    "facility_name" => "SPECIAL  TREATMENT CENTRE(CASINO)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13121,
                    "facility_name" => "NGAIRA DISPENSARY",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13163,
                    "facility_name" => "RHODES CHEST CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13039,
                    "facility_name" => "LAGOS ROAD DISPENSARY(STAFF)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13122,
                    "facility_name" => "NGARA HEALTH CENTRE",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13138,
                    "facility_name" => "PANGANI CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13007,
                    "facility_name" => "KARIOKOR CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13076,
                    "facility_name" => "MATHARI MENTAL HOSPITAL",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12974,
                    "facility_name" => "HURUMA LIONS DISPENSARY",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13075,
                    "facility_name" => "MATHARE 3A EDARP",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12973,
                    "facility_name" => "HURUMA EDARP",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12972,
                    "facility_name" => "HURUMA NCCK",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12976,
                    "facility_name" => "HURUMA NURSING HOME",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13199,
                    "facility_name" => "ST BRIDGETS CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13139,
                    "facility_name" => "PARKROAD NURSING HOME",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13158,
                    "facility_name" => "RADIANT HOSPITAL",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12940,
                    "facility_name" => "FAMILY HEATH OPTIONS  RIBEIRO",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12939,
                    "facility_name" => "FAMILY HEALTH OPTIONS  PHOENIX",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12965,
                    "facility_name" => "GURUNANAK HOSPITAL",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13243,
                    "facility_name" => "UPENDO DISPENSARY",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13066,
                    "facility_name" => "MARIE STOPES PANGANI",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13065,
                    "facility_name" => "MARIE STOPES KENCOM",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12899,
                    "facility_name" => "CRESCENT MEDICAL AID JAMIA",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13250,
                    "facility_name" => "WAKIBE MEDICAL CENTRE",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13111,
                    "facility_name" => "NAIROBI OUTPATIENT CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13237,
                    "facility_name" => "TRANSCOM MEDICAL CENTRE",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13021,
                    "facility_name" => "KENYA AIRWAYS CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13187,
                    "facility_name" => "SINGLE MOTHERS VCT(SMAK)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13092,
                    "facility_name" => "MINISTRY OF EDUC VCT(MOEST)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13174,
                    "facility_name" => "RURAL AID VCT",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13107,
                    "facility_name" => "NAIOTH VCT",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13206,
                    "facility_name" => "ST JOHNS AMBULANCE VCT",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12901,
                    "facility_name" => "COMMUNITY HEALTH FOUND",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13031,
                    "facility_name" => "KENYA INSTITUTE OF EDUCATION/KENYA ASSOCIATION OF COUNSELLING(KIE/KAPC)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13233,
                    "facility_name" => "SUPREME COUNCIL OF MUSLIMS(SUPKEM)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13180,
                    "facility_name" => "SEX WORKERS OPERATION PROGRAME(SWOP)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13108,
                    "facility_name" => "DEAF LIVERPOOL",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13078,
                    "facility_name" => "MATHARE POLICE DEPOT",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12861,
                    "facility_name" => "AFRICAN AIR RESCUE CITY CENTRE(AAR)",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12882,
                    "facility_name" => "BETHEL CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12890,
                    "facility_name" => "CANAAN MEDICAL CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 12946,
                    "facility_name" => "GAIMU MEDICAL CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 13083,
                    "facility_name" => "MEDICARE MEDICAL CLINIC",
                    "subcounty_id" => 296
                ],
                [
                    "mfl_code" => 16796,
                    "facility_name" => "AAR SARIT CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12867,
                    "facility_name" => "AGA KHAN HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12870,
                    "facility_name" => "AMURT HEALTH CENTRE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12874,
                    "facility_name" => "AVENUE NURSING  HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12898,
                    "facility_name" => "CLINITEC DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12905,
                    "facility_name" => "COPTIC HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12918,
                    "facility_name" => "DOD MRS DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12922,
                    "facility_name" => "DR.GACHARE MEDICAL CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12924,
                    "facility_name" => "DR.AZIZ MOHAMMED MEDICAL CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12926,
                    "facility_name" => "DR.MONTET MEDICAL CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12927,
                    "facility_name" => "DR.MUASYA MEDICAL CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12928,
                    "facility_name" => "DR.WERE MEDICAL CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12950,
                    "facility_name" => "GERTRUDES HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12951,
                    "facility_name" => "GERTRUDES OTHAYA ROAD DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12966,
                    "facility_name" => "GYNAPAED DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12968,
                    "facility_name" => "HIGHRIDGE HEALTH CENTRE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12979,
                    "facility_name" => "I R IRAN DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12993,
                    "facility_name" => "KABETE APPROVED DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 12994,
                    "facility_name" => "KABETE BARRACKS DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13001,
                    "facility_name" => "KANGEMI HEALTH CENTRE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13009,
                    "facility_name" => "KARURA HEALTH CENTRE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13013,
                    "facility_name" => "KENYA AIDS VACCINE INITIATIVE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 16169,
                    "facility_name" => "LADY NORTHEY DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 16800,
                    "facility_name" => "LEA TOTO CLINIC (WESTLANDS)",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13049,
                    "facility_name" => "LIANAS CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13050,
                    "facility_name" => "LIVERPOOL VCT",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13052,
                    "facility_name" => "LOWER KABETE DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13062,
                    "facility_name" => "MARIA IMMACULATA HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13067,
                    "facility_name" => "MARIE STOPES CLINIC WESTLANDS",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13093,
                    "facility_name" => "MJI WA HURUMA DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13098,
                    "facility_name" => "MP SHAH HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13110,
                    "facility_name" => "NAIROBI HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13117,
                    "facility_name" => "NAIROBI WOMEN'S HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 16795,
                    "facility_name" => "NAIROBI WOMEN'S HOSPITAL ADAMS",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13120,
                    "facility_name" => "NEW LIFE HOME(CHILDREN'S HOME WESTLANDS)",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13137,
                    "facility_name" => "PADENS CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13194,
                    "facility_name" => "NATIONAL SPINAL INJURY HOSPITAL",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13201,
                    "facility_name" => "ST.FLORENCE MEDICAL CARE HEALTH CENTRE",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13209,
                    "facility_name" => "ST.JOSEPH THE WORKER DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13231,
                    "facility_name" => "STATE HOUSE CLINIC",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13232,
                    "facility_name" => "STATE HOUSE DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13242,
                    "facility_name" => "UNIVERSITY OF NAIROBI DISPENSARY",
                    "subcounty_id" => 344
                ],
                [
                    "mfl_code" => 13258,
                    "facility_name" => "WESTLANDS HEALTH CENTRE",
                    "subcounty_id" => 344
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
        Schema::dropIfExists('tbl_facility');
    }
}
