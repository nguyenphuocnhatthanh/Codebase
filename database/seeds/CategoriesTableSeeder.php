<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
//        $resource = file_get_contents(database_path('data/categories.json'));
        $resource = file_get_contents(database_path('data/categories_2018_12.json'));

        $data = json_decode($resource, true);

        DB::transaction(function () use ($data) {
            foreach ($data['sub_categories'] as $i => $value) {
                $category = \App\Models\Category::create([
                    'name' => $value['name'],
                    'gender' => explode(',', $value['gender']),
                    'style' => ! empty($value['style']) ? $value['style']: null,
                    'image' => ! empty($value['picture']) ? $value['picture'] : null,
                ]);

                if (! empty($value['accessory_id'])) {
                    $category->accessories()->attach($value['accessory_id']);
                }
            }
        });
    }
}
