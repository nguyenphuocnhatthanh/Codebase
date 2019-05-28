<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SettingStylesTableSeeder extends Seeder
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
            ['key' => 'bust', 'value' => [27, 120]],
            ['key' => 'bra', 'value' => [27, 120]],
            ['key' => 'waist', 'value' => [27, 120]],
            ['key' => 'hips', 'value' => [27, 120]],
            ['key' => 'neck', 'value' => [27, 120]],
            ['key' => 'chest', 'value' => [27, 120]],
            ['key' => 'sleeve', 'value' => [27, 120]],
            ['key' => 'inseam', 'value' => [27, 120]],
            ['key' => 'shoes_size', 'value' => [10, 70]],
            ['key' => 'body_type_female', 'value' => $this->generateBodyImage()],
            ['key' => 'body_type_male', 'value' => $this->generateBodyImage()],
        ];

        foreach ($data as $value) {
            \App\Models\SettingStyle::updateOrCreate(['key' => $value['key']], $value);
        }
    }

    private function generateBodyImage()
    {
        $result = [];

        for ($i = 0; $i < 5; $i++) {
            array_push($result, [
                'name' => $this->faker->name,
                'image' => $this->faker->imageUrl(),
                'slug' => $i
            ]);
        }

        return $result;
    }
}
