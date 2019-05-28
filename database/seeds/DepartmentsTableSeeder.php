<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Women', 'image' => public_path('images/departments/Group_18@3x.png')],
            ['name' => 'Kids', 'image' => public_path('images/departments/Group_17@3x.png')],
            ['name' => 'Men', 'image' => public_path('images/departments/Group_17@3x.png')],
        ];

        foreach ($data as $value) {
            $path = 'departments/'. File::basename($value['image']);
            Storage::put($path, fopen($value['image'], 'r+'));
            $value['image'] = $path;
            \App\Models\Department::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
