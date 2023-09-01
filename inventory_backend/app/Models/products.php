<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number','manufacturer','product_name','description','size',
        'stocks','production_date','expiration_date'
    ];



    /* $product->serial_number = $request->serial_number;
    $product->manufacturer = $request->manufacturer;
    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->size = $request->size;
    $product->stocks = $request->stocks;
    $product->production_date = $request->production_date;
    $product->expiration_date = $request->expiration_date; */
}
