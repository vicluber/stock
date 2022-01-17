<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->count(10)->create();
        \App\Models\Domain::factory()->count(5)->create();
        \App\Models\Product::factory()->count(20)->create();
        \App\Models\Category::factory()->count(10)->create();
        \App\Models\Item::factory()->count(150)->create();
        //\App\Models\Supplier::factory()->count(15)->create();
        //\App\Models\Brand::factory()->count(30)->create(); SupplierSeeder.php exist just and example for seeding tables in different classes with this command: php artisan db:seed --class=BrandSeeder
    }
}
