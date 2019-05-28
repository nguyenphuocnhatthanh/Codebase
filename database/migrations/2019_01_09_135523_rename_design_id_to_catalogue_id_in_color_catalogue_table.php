<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDesignIdToCatalogueIdInColorCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_catalogue', function (Blueprint $table) {
            $table->renameColumn('design_id', 'catalogue_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_catalogue', function (Blueprint $table) {
            $table->renameColumn('catalogue_id', 'design_id');
        });
    }
}
