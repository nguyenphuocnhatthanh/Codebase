<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCatalogueIdToDigiiCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digii_collections', function (Blueprint $table) {
            $table->dropColumn('catalogue_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digii_collections', function (Blueprint $table) {
            $table->unsignedInteger('catalogue_id');
        });
    }
}
