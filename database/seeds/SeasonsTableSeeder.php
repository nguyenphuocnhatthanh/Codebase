<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Winter', 'image' => public_path('images/seasons/Image_42@3x.png')],
            ['name' => 'Spring', 'image' => public_path('images/seasons/Image_43@3x.png')],
            ['name' => 'Summer', 'image' => public_path('images/seasons/Image_44@3x.png')],
            ['name' => 'Autumn', 'image' => public_path('images/seasons/Image_45@3x.png')],
        ];

        foreach ($data as $value) {
            $path = 'seasons/'. File::basename($value['image']);
            Storage::put($path, fopen($value['image'], 'r+'));
            $value['image'] = $path;
            \App\Models\Season::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
