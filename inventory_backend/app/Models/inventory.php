<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','product_id','stocks','production_date','expiration_date','status'
    ];


    public function category(){
        return $this->belongsTo(category::class);
    }

    public function product_info(){
        return $this->belongsTo(product_info::class);
    }
 
}
