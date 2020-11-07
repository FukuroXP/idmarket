<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('logo')->nullable();
            $table->string('backgorund_front')->nullable();
            $table->string('backgorund_back')->nullable();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('id_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('etc1')->nullable();
            $table->string('etc2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute');
    }
}
