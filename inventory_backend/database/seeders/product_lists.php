<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\products;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class product_lists extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for($i = 1; $i <=5; $i++){
            products::create([
                'serial_number'=>fake()->ean13(),
                'manufacturer'=>fake()->randomElement(['Pedigree','Sarimanok','Whiskas']),
                'product_name'=>"product name $i",
                'description'=>"description $i",
                'price'=>fake()->randomFloat(2, 10, 3000),
                'size'=>(rand(00,1000)),
                'stocks'=>(rand(00,1000)),
                'production_date'=>fake()->dateTimeBetween('-1 year' ,'+2 year'),
                'expiration_date'=>fake()->dateTimeBetween('+1 year' ,'+2 year'),
            ]);
        }
       

        

       /*  DB::table('products')->insert([
            'serial_number'=>fake()->randomNumber(5),
            'manufacturer'=>fake()->name,
            'product_name'=>fake()->name,
            'description'=>fake()->paragraphs(2),
            'size'=>fake()->randomNumber(3),
            'stocks'=>fake()->randomNumber(2),
            'production_date'=>fake()->dateTime(),
            'expiration_date'=>fake()->dateTime(),
        ]); */
    }
}
