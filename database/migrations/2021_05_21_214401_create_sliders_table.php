<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('main_title_en');
            $table->string('main_title_fr');
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_fr')->nullable();
            $table->string('button_url')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->unsignedBigInteger('site_id')->nullable();
            $table->foreign('photo_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null');
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
        Schema::dropIfExists('sliders');
    }
}
