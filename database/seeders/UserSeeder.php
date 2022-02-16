<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Normal Entry,one entry per run "php artisan db:seed --class=UsersSeeder"
        // DB::table('users')->insert([ 
        //     'name'=>'Shubham',
        //     'email'=>'s@gmail.com',
        //     'password'=>Hash::make('1234')
        // ]);

        //Random Entry,one entry per run "php artisan db:seed --class=UsersSeeder"
        // DB::table('users')->insert([ 
        //     'name'=>Str::random(5),
        //     'email'=>Str::random(5).'@gmail.com',
        //     'password'=>Hash::make(Str::random(5))
        // ]);

        //Usng Foreach loop
        // foreach(range(1,5) as $value){
        // DB::table('users')->insert([
        //     'name'=>Str::random(5),
        //     'email'=>Str::random(5).'@gmail.com',
        //     'password'=>Hash::make(Str::random(5))
        // ]);

        //using faker (run "composer require fakerphp/faker" for library)        
        $faker = Faker::create();  //Create Object of Faker that is imported above

        foreach(range(1,10) as $value){
        DB::table('users')->insert([
            'name'=>$faker->name(),
            'email'=>$faker->unique()->safeEmail(),
            'password'=>Hash::make($faker->password()),
        ]);
        }

    

    }
}
