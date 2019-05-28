<?php

use Illuminate\Database\Seeder;

class AccessoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            ['name' => 'Backpack', 'image' => public_path('images/accessories/ic_backpack@3x.png')],
//            ['name' => 'Bag', 'image' => public_path('images/accessories/ic_bag@3x.png')],
//            ['name' => 'Necklaces', 'image' => public_path('images/accessories/ic_necklaces@3x.png')],
//            ['name' => 'Bracelet', 'image' => public_path('images/accessories/ic_bracelet@3x.png')],
//            ['name' => 'Heels', 'image' => public_path('images/accessories/ic_heels@3x.png')],
//            ['name' => 'Clocks', 'image' => public_path('images/accessories/ic_clocks@3x.png')],
//            ['name' => 'Rings', 'image' => public_path('images/accessories/ic_rings@3x.png')],
//            ['name' => 'Umbrella', 'image' => public_path('images/accessories/ic_umbrella@3x.png')],
//            ['name' => 'High Boots', 'image' => public_path('images/accessories/ic_high_boots@3x.png')],
//            ['name' => 'Belt', 'image' => public_path('images/accessories/ic_belt@3x.png')],
//            ['name' => 'Boots', 'image' => public_path('images/accessories/ic_boots@3x.png')],
//            ['name' => 'Baseball Cap', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Bags', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Dresses', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Jacket & Coats', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Sleepwear', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Jeans', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Pants', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Shoes', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Shorts', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Skirts', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Sweaters', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Swim', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Tops', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Others', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Shirts', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Suits', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Blazers', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Bottoms', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Matching Sets', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'One Pieces', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Pajamas', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],
            ['name' => 'Costumes', 'image' => public_path('images/accessories/ic_baseball_cap@3x.png')],

        ];

        $departmentIds = \App\Models\Department::pluck('id')->toArray();
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        foreach ($data as $value) {
            $rand = rand(1, 3);
            $path = 'accessories/'. File::basename($value['image']);
            Storage::put($path, fopen($value['image'], 'r+'));
            $value['image'] = $path;
            $accessory = \App\Models\Accessory::updateOrCreate(['name' => $value['name']], $value);
            $accessory->departments()->sync(array_random($departmentIds, $rand));
            $accessory->categories()->sync(array_random($categoryIds, $rand));
        }
    }
}
