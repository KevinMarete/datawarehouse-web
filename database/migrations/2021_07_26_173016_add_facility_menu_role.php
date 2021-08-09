<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddFacilityMenuRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menu = DB::table('tbl_menu')->where('name', 'Facility')->first();
        $role = DB::table('tbl_role')->where('name', 'user')->first();

        DB::table('tbl_menu_role')->insert(
            ['menu_id' => $menu->id, 'role_id' => $role->id, 'created_at' => now()],
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $menu = DB::table('tbl_menu')->where('name', 'Facility')->first();
        $role = DB::table('tbl_role')->where('name', 'user')->first();

        DB::table('tbl_menu_role')->where('menu_id', $menu->id)->where('role_id', $role->id)->delete();
    }
}
