<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class WashingMethodCategoriesTableSeeder extends Seeder
{
    /**
     * @var Faker
     */
    private $faker;

    /**
     * SettingStylesTableSeeder constructor.
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
        $data = [
            [
                'name' => 'Machine Wash',
                'image' => $this->faker->imageUrl(),
            ], [
                'name' => 'Tumble Dry',
                'image' => $this->faker->imageUrl(),
            ], [
                'name' => 'Drying',
                'image' => $this->faker->imageUrl(),
            ], [
                'name' => 'Ironing',
                'image' => $this->faker->imageUrl(),
            ], [
                'name' => 'Bleaching',
                'image' => $this->faker->imageUrl(),
            ], [
                'name' => 'Dry Clean',
                'image' => $this->faker->imageUrl(),
            ],
        ];

        foreach ($data as $i => $value) {
            $washingMethodCategory = \App\Models\WashingMethodCategory::updateOrCreate(['name' => $value['name']], $value);
            $this->runWashingMethod($i, $washingMethodCategory->id);
        }
    }

    /**
     * @param $position
     * @param $washingMethodCategoryId
     *
     * @return void
     */
    private function runWashingMethod($position, $washingMethodCategoryId)
    {
        $data = [
            [
                ['name' => 'Cold', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/wash_cold.png')],
                ['name' => 'Perm. Press', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/wash_perm_press.png')]
            ], [
                ['name' => 'Medium', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/tumble_medium.png')],
                ['name' => 'Perm. Press', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/tumble_perm_press.png')],
            ], [
                ['name' => 'Do Not Dry', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/drying_do_not_dry.png')],
            ], [
                ['name' => 'Medium', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/ironing_medium.png')],
                ['name' => 'No Steam', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/ironing_no_steam.png')],
            ], [
                ['name' => 'Do Not Bleach', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/bleaching_do_not_bleach.png')],
            ], [
                ['name' => 'Any Solvent', 'washing_method_category_id' => $washingMethodCategoryId, 'image' => public_path('images/washing_methods/dry_any_solvent.png')],
            ],
        ];

        foreach ($data as  $i => $prepareData) {
            if ($position === $i) {
                foreach ($prepareData as $value) {
                    $path = 'washing_methods/'. File::basename($value['image']);
                    Storage::put($path, fopen($value['image'], 'r+'));
                    $value['image'] = $path;
                    \App\Models\WashingMethod::updateOrCreate(['name' => $value['name'], 'washing_method_category_id' => $washingMethodCategoryId], $value);
                }
                break;
            }

        }
    }
}
