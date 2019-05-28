<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Standard', 'value' => [27, 100]],
            ['name' => 'Plus', 'value' => [27, 100]],
            ['name' => 'Petite', 'value' => [27, 100]],
            ['name' => 'Juniors', 'value' => [27, 100]],
        ];

        foreach ($data as $value) {
            \App\Models\Size::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
