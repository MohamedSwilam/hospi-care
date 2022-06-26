<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->unsignedBigInteger('catalog_file_id')->nullable();
            $table->foreign('photo_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('catalog_file_id')->references('id')->on('files')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropForeign(['photo_id']);
            $table->dropForeign(['catalog_file_id']);
            $table->dropColumn('photo_id');
            $table->dropColumn('catalog_file_id');
        });
    }
}
