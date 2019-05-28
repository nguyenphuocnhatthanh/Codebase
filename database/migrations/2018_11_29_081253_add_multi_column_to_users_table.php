<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultiColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->decimal('credits')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->dateTime('verified_at')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('logged_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'city',
                'state',
                'credits',
                'is_verified',
                'verified_at',
                'is_approved',
                'approved_at',
                'logged_at',
            ]);
        });
    }
}
