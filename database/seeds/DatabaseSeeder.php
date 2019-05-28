<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(StylesTableSeeder::class);
        $this->call(SettingStylesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AccessoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
        $this->call(OutfitCategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CataloguesTableSeeder::class);
        $this->call(DigiiCollectionsTableSeeder::class);
    }
}
