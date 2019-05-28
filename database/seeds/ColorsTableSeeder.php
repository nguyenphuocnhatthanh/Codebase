<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Red', 'code' => '#d23738'],
            ['name' => 'Pink', 'code' => '#d23799'],
            ['name' => 'Orange', 'code' => '#e27a2a'],
            ['name' => 'Yellow', 'code' => '#ffe32e'],
            ['name' => 'Green', 'code' => '#22cc1c'],
            ['name' => 'Blue', 'code' => '#377ad2'],
            ['name' => 'Purple', 'code' => '#8f32d2'],
            ['name' => 'Gold', 'code' => '#deba2d'],
            ['name' => 'Silver', 'code' => '#d6d6d6'],
            ['name' => 'Black', 'code' => '#000000'],
            ['name' => 'Grey', 'code' => '#727272'],
            ['name' => 'White', 'code' => '#ffffff'],
            ['name' => 'Cream', 'code' => '#e2a882'],
        ];

        foreach ($data as $value) {
            \App\Models\Color::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
