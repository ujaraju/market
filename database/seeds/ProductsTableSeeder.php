<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
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

        foreach(range(1, 50) as $index)
        {
            $product = Product::create([
            	'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
                'title' => $faker->catchPhrase,
                'description' => $faker->text(400),
                'price' => $faker->randomNumber(2),
                'created_at'=>$faker->date(),
                'updated_at'=>$faker->date(),
                'published_at'=>$faker->date(),
            ]);
			$category = Category::lists('id')->toArray();
            $product->categories()->sync($category);
        }

    }
}