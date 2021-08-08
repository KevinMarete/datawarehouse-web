<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMenuGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name']);
        });

        //Add default data
        DB::table('tbl_menu_group')->insert(
            array(
                ['name' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'created_at' => now()],
                ['name' => 'Data', 'icon' => 'fas fa-database', 'created_at' => now()],
                ['name' => 'Settings', 'icon' => 'fas fa-cog', 'created_at' => now()]
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
        Schema::dropIfExists('tbl_menu_group');
    }
}
