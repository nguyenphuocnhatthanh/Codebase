<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Catalogue::class, function (Faker $faker) {
    $accessory = \App\Models\Accessory::inRandomOrder()->first();
    $seasons = \App\Models\Season::pluck('id')->toArray();
    $seasonId = array_rand(array_merge([null], $seasons));
    $collection = \App\Models\DigiiCollection::inRandomOrder()->first();

    $data = [
        'user_id' => factory(\App\Models\User::class)->create()->id,
        'digii_collection_id' => $collection->id,
        'accessory_id' => $accessory->id,
        'category_id' => $accessory->categories()->inRandomOrder()->first()->id,
        'brand_id' => \App\Models\Brand::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'image' => $faker->imageUrl(),
        'type' => array_rand(\App\Models\Catalogue::getAllType(), 1)
    ];

    if ($seasonId) {
        $data['season_id'] = $seasonId;
    }

    return $data;
});
