<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_password', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('category_id')->unsigned();
              $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
              $table->unsignedBigInteger('password_id')->unsigned();
              $table->foreign('password_id')->on('passwords')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('category_password');
    }
};
