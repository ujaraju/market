<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('images')->delete();

        $faker = Faker::create();
        

        foreach(range(1, 150) as $index)
        {

            $images = Image::create([
                'url' => $faker->imageUrl('970', '400','city'),
            ]);
        }
    }}
