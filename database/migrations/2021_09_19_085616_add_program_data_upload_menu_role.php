<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddProgramDataUploadMenuRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menu = DB::table('tbl_menu')->where('name', 'Data Upload')->first();
        $admin_role = DB::table('tbl_role')->where('name', 'admin')->first();
        $user_role = DB::table('tbl_role')->where('name', 'user')->first();

        DB::table('tbl_menu_role')->insert(
            [
                ['menu_id' => $menu->id, 'role_id' => $admin_role->id, 'created_at' => now()],
                ['menu_id' => $menu->id, 'role_id' => $user_role->id, 'created_at' => now()],
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
        $menu = DB::table('tbl_menu')->where('name', 'Data Upload')->first();
        $admin_role = DB::table('tbl_role')->where('name', 'admin')->first();
        $user_role = DB::table('tbl_role')->where('name', 'user')->first();

        DB::table('tbl_menu_role')->where('menu_id', $menu->id)->where('role_id', $admin_role->id)->delete();
        DB::table('tbl_menu_role')->where('menu_id', $menu->id)->where('role_id', $user_role->id)->delete();
    }
}
