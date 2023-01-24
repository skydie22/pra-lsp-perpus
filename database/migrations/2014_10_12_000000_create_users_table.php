<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            $table->string('kode' , 25);
            $table->char('nis' , 20)->nullable();
            $table->string('fullname' , 125);
            $table->string('username')->unique();
            $table->text('password' , 50);
            $table->string('kelas' , 50)->nullable();
            $table->text('alamat')->nullable();
            $table->enum('verif' , ['verified' , 'unverified'])->default('unverified');
            $table->enum('role', ['admin' , 'user']);
            $table->date('join_date');
            $table->date('terakhir_login')->nullable();
            $table->text('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
