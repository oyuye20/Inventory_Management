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

       /*  $product->serial_number = $request->serial_number;
        $product->manufacturer = $request->manufacturer;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->stocks = $request->stocks;
        $product->production_date = $request->production_date;
        $product->expiration_date = $request->expiration_date; */

        

        DB::table('products')->insert([
            'serial_number'=>fake()->randomNumber(5),
            'manufacturer'=>fake()->name,
            'product_name'=>fake()->name,
            'description'=>fake()->paragraphs(2),
            'size'=>fake()->randomNumber(3),
            'stocks'=>fake()->randomNumber(2),
            'production_date'=>fake()->dateTime(),
            'expiration_date'=>fake()->dateTime(),
        ]);
    }
}
