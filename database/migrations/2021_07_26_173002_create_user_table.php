<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_active')->default(true);
            $table->integer('role_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('tbl_role')->onUpdate('cascade')->onDelete('cascade');
        });

        //Add default data
        DB::table('tbl_user')->insert(
            array(
                [
                    'firstname' => 'Super',
                    'lastname' => 'Admin',
                    'phone' => '0722123456',
                    'email' => 'superadmin@gmail.com',
                    'password' => '$2y$10$Pm9//JP64ObJ9Eqj82u07uDZpXEFCNqDvkPqCFJ.P8IdDiZMUEys.',
                    'role_id' => 1,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
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
        Schema::dropIfExists('tbl_user');
    }
}
