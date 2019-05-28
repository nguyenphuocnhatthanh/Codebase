<?php

use Illuminate\Database\Seeder;

class DigiiCollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DigiiCollection::class, 20)->create();
    }
}
