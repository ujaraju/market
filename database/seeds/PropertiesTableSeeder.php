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
                'price' => $faker->randomNumber(8),

                'address'=>$faker->Address(),
                'lat'=>$faker->latitude($min = 27.65, $max = 27.75),    //somewhere in kathmandu
                'lng'=>$faker->longitude($min = 85.25, $max = 85.35),  //somewhere in kathmandu
                
            //facts
                'plot_area'=>$faker->randomNumber(5),
                'size_area'=>$faker->randomNumber(5),
                'built_year'=>$faker->year($max = 'now'),
                'levels'=>$faker->numberBetween($min = 1, $max = 15) ,


            //features
                'bed'=>$faker->numberBetween($min = 4, $max = 15) ,
                'bath'=>$faker->numberBetween($min = 1, $max = 3) ,
                'kitchen'=>$faker->numberBetween($min = 1, $max = 5) ,
                'garage'=>'Space for 2 bikes and a car',
                'floor'=>'Marble stairs, wood parquet rooms',
                'use'=>'Commercial & residential',

            //additional features
            'additional_features'=>implode("|",$faker->randomElements($array = array ('Balcony', 'Dining room', 'Air conditioner', 'Living area', 'Central heating', 'Solar power', 'Laundry', 'Water reserve tank', 'Storage room', 'Pooja room'), $count = 10)) ,

            //utilities
            'utilities'=>implode("|",$faker->randomElements($array = array ('Water','Electricity','Phone', 'Cable', 'Internet'), $count = 5)),

            //around the property
            'around_property'=>implode("|",$faker->randomElements($array = array ('Ganesh Templae','Ram Mandir','Lulu Supermarket', 'Bus Stop', 'Library', 'Park', 'Museum', 'Jai Nepal Cinema', 'Hospital', 'Hiking Trail', 'Bhatbhateni Supermarket','Hot Ice Night Club', 'Restaurants', 'Cafe Baba','Peanuts Departmental Store','Gold\'s Gym', 'Public Youth Campus', 'Saraswati Biarding School'), $count = 10)),


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
