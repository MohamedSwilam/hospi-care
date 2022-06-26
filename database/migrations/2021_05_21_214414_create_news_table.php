<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_fr');
            $table->text('details_en');
            $table->text('details_fr');
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
        Schema::dropIfExists('news');
    }
}
