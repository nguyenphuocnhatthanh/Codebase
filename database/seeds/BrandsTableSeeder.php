<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BrandsTableSeeder extends Seeder
{
    /**
     * @var Faker
     */
    private $faker;

    /**
     * BrandsTableSeeder constructor.
     * @param Faker $faker
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resource = file_get_contents(database_path('data/brands.json'));
        $data = json_decode($resource, true);

        foreach ($data as $value) {
            \App\Models\Brand::updateOrCreate(['name' => $value['name']], [
                'name' => $value['name'],
                'type' => $value['category_name'],
                'image' => $this->faker->imageUrl(),
                'is_feature' => rand(0, 1)
            ]);
        }
    }
}
