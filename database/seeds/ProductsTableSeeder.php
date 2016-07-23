<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Image;
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


        foreach(range(1, 3) as $index)
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
            
            //product-category relation
            $categories = Category::orderByRaw('RAND()')->take(1)->get()->lists('id')->toArray();
            $product->categories()->sync($categories);


            //product-image relation
            $images=Image::orderByRaw('RAND()')->take(3)->get()->lists('id')->toArray();
            $product->images()->sync($images);


        }



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
			
            //product-category relation
            $categories = Category::orderByRaw('RAND()')->take(1)->get()->lists('id')->toArray();
            $product->categories()->sync($categories);


            //product-image relation
            $images=Image::orderByRaw('RAND()')->take(3)->get()->lists('id')->toArray();
            $product->images()->sync($images);


        }

    }
}