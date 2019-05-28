<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('bust')->nullable();
            $table->unsignedInteger('bra')->nullable();
            $table->unsignedInteger('waist')->nullable();
            $table->unsignedInteger('hips')->nullable();
            $table->unsignedInteger('neck')->nullable();
            $table->unsignedInteger('chest')->nullable();
            $table->unsignedInteger('sleeve')->nullable();
            $table->unsignedInteger('inseam')->nullable();
            $table->string('body_type_female')->nullable();
            $table->string('body_type_male')->nullable();
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
