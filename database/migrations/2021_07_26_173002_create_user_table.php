<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
                    'firstname' => 'Default',
                    'lastname' => 'Admin',
                    'phone' => '0722123456',
                    'email' => 'admin@gmail.com',
                    'password' => '$2y$10$BKIe0aKlFPNfIQoaaJbTx.LjugLBBKPNVk6dPUvwC/2y4r2ewXlii',
                    'role_id' => 1,
                    'email_verified_at' => now(),
                    'created_at' => now()
                ],
                [
                    'firstname' => 'Default',
                    'lastname' => 'User',
                    'phone' => '0711444555',
                    'email' => 'user@gmail.com',
                    'password' => '$2y$10$CMUgYSo66s3WuQWOQVicf.uEgFrhRudCxX9p3gvropHho/fH54fQC',
                    'role_id' => 2,
                    'email_verified_at' => now(),
                    'created_at' => now()
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
        Schema::dropIfExists('tbl_user');
    }
}
