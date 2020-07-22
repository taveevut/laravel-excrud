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
            $table->engine = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->string('name');
            $table->string('tel')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('nickname')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('province_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('remark')->nullable();
            $table->enum('type', ['1', '2'])->nullable();
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
