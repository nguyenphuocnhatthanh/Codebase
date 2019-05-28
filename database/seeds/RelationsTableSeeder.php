<?php

use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Kids'],
            ['name' => 'Husband'],
            ['name' => 'Sister'],
        ];

        \App\Models\Relation::truncate();

        foreach ($data as $value) {
            \App\Models\Relation::create($value);
        }
    }
}
