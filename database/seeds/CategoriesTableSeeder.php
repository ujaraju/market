<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->delete();
        $faker = Faker::create();

        Category::create([
            'name' => 'Buy',
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date()
        ]);
        Category::create([
            'name' => 'Sell',
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date()
        ]);
    }
}
