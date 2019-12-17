<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Flagship',
            'slug' => str_slug('Flagship'),
            'description' => 'Flagship Phone'
        ]);

        Category::create([
            'name' => 'Midrange',
            'slug' => str_slug('Midrange'),
            'description' => 'Midrange Phone'
        ]);

        Category::create([
            'name' => 'Low End',
            'slug' => str_slug('Low End'),
            'description' => 'Low End Phone'
        ]);

        Category::create([
            'name' => 'Asus',
            'slug' => str_slug('Asus'),
            'description' => 'Asus Phone'
        ]);

        Category::create([
            'name' => 'Samsung',
            'slug' => str_slug('Samsung'),
            'description' => 'Samsung Phone'
        ]);

        Category::create([
            'name' => 'Oppo',
            'slug' => str_slug('Oppo'),
            'description' => 'Oppo Phone'
        ]);

        Category::create([
            'name' => 'Vivo',
            'slug' => str_slug('Vivo'),
            'description' => 'Vivo Phone'
        ]);
    }
}
