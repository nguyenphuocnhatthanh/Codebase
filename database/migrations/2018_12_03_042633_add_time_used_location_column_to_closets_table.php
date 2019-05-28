<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeUsedLocationColumnToClosetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('closets', function (Blueprint $table) {
            $table->unsignedInteger('time_used')->default(0);
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('closets', function (Blueprint $table) {
            $table->dropColumn(['time_used', 'location']);
        });
    }
}
