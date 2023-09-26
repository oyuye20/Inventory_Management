<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category','description'
    ];

    public function product_info(){
        return $this->hasMany(product_info::class);
    }

    public function inventory(){
        return $this->hasMany(inventory::class);
    }

}

