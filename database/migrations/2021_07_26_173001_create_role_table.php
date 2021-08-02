<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name']);
        });

        //Add default data
        DB::table('tbl_role')->insert(
            array(
                [
                    'name' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'user',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
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
        Schema::dropIfExists('tbl_role');
    }
}
