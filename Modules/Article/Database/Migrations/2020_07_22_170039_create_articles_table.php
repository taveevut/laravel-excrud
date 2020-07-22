<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->string('slug')->nullable();
            $table->longText('details')->nullable()->comment('รายละเอียด');
            $table->string('author')->nullable()->comment('ผู้เขียน');
            $table->string('date');
            $table->integer('view')->default(15);
            $table->integer('sort')->nullable();
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
