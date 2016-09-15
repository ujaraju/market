<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $faker = Faker::create();
        
        //initial user
        User::create([
            'name' => 'Raju Maharjan',
            'email' => 'squizeers@gmail.com',
            'password' => bcrypt('password'),
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date()
        ]);

        //create 10 users
        foreach(range(1, 10) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'created_at'=>$faker->date(),
                'updated_at'=>$faker->date()
            ]);
        }
    }
}





