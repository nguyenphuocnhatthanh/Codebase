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

$factory->define(App\Models\DigiiCollection::class, function (Faker $faker) {
    $brand = \App\Models\Brand::inRandomOrder()->first();

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'image' => $faker->imageUrl(),
        'brand_id' => $brand->id,
    ];
});
