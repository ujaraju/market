<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Property;
use App\Image;
use App\Category;



class PropertiesTableSeeder extends Seeder
{
    public function run()
    {

    	DB::table('properties')->delete();

        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            $property = Property::create([
            	'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
                'title' => $faker->catchPhrase,
                'description' => $faker->text(400),
                'price' => $faker->randomNumber(2),
                'created_at'=>$faker->date(),
                'updated_at'=>$faker->date(),
                'published_at'=>$faker->date(),
            ]);
			
            //Property-category relation
            $categories = Category::orderByRaw('RAND()')->take(1)->get()->lists('id')->toArray();
            $property->categories()->sync($categories);


            //Property-image relation
            $images=Image::orderByRaw('RAND()')->take(3)->get()->lists('id')->toArray();
            $property->images()->sync($images);


        }

    }
}
