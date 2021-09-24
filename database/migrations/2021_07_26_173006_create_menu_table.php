<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->integer('menu_group_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'menu_group_id']);

            $table->foreign('menu_group_id')->references('id')->on('tbl_menu_group')->onUpdate('cascade')->onDelete('cascade');
        });

        //Add default data
        DB::table('tbl_menu')->insert(
            array(
                ['name' => 'Care and Treatment', 'link' => '/dashboard/care-and-treatment', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'Screening and Testing', 'link' => '/dashboard/screening-and-testing', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'Multi-Month Dispensing', 'link' => '/dashboard/multi-month-dispensing', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'CD4 Enrollment Testing', 'link' => '/dashboard/cd4-enrollment-testing', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'Viral Load Testing', 'link' => '/dashboard/viral-load-testing', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'ART Cohort Retention', 'link' => '/dashboard/art-cohort-retention', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'HIV Cervical Cancer', 'link' => '/dashboard/hiv-cervical-cancer', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'PMTCT-EID-HEI-POS-HCA', 'link' => '/dashboard/pmtct-eid-hei-pos-hca', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'IPT Outcomes', 'link' => '/dashboard/ipt-outcomes', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'TB Prevention and Treatment', 'link' => '/dashboard/tb-prevention-and-treatment', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'Index Testing', 'link' => '/dashboard/index-testing', 'menu_group_id' => '1', 'created_at' => now()],
                ['name' => 'Query', 'link' => '/query', 'menu_group_id' => '2', 'created_at' => now()],
                ['name' => 'Query Category', 'link' => '/querycategory', 'menu_group_id' => '2', 'created_at' => now()],
                ['name' => 'Query Executor', 'link' => '/query/executor', 'menu_group_id' => '2', 'created_at' => now()],
                ['name' => 'MenuGroup', 'link' => '/menugroup', 'menu_group_id' => '3', 'created_at' => now()],
                ['name' => 'Menu', 'link' => '/menu', 'menu_group_id' => '3', 'created_at' => now()],
                ['name' => 'MenuRole', 'link' => '/menurole', 'menu_group_id' => '3', 'created_at' => now()],
                ['name' => 'Role', 'link' => '/role', 'menu_group_id' => '3', 'created_at' => now()],
                ['name' => 'User', 'link' => '/user', 'menu_group_id' => '3', 'created_at' => now()]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_menu');
    }
}
