<?php

use Illuminate\Database\Seeder;

class OutfitCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\OutfitCategory::class, 20)->create();
    }
}
