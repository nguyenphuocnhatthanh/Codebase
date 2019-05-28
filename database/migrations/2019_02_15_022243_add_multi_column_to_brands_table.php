<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultiColumnToBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->unsignedInteger('total_staff')->default(0);
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_active')->default(0);
            $table->decimal('total_credit')->default(0);
            $table->decimal('credit_used')->default(0);
            $table->integer('total_feed')->default(0);
            $table->integer('total_ticket')->default(0);
            $table->integer('total_follower')->default(0);
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn([
                'total_staff',
                'state',
                'city',
                'is_active',
                'total_credit',
                'credit_used',
                'total_feed',
                'total_ticket',
                'total_follower',
                'latitude',
                'longitude',
            ]);
        });
    }
}
