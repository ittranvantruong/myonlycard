<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code_card')->unique()->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('avatar')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('roles');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'roles' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
