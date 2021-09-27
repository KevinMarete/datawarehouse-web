<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProgramDashboardMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tbl_menu')->insert(
            ['name' => 'Program Management', 'link' => '/dashboard/program-management', 'menu_group_id' => '1', 'created_at' => now()]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('tbl_menu')->where('name', 'Program Management')->delete();
    }
}
