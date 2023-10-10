<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','serial_number','manufacturer','product_name','description','size'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }



    public function inventory(): HasMany{
        return $this->hasMany(inventory::class);
    }

    
}
