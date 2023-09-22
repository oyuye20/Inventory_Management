<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_orders extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'transactions_id','product_name','quantity','price','total'
    ];

    public function transactions(){
        return $this->belongsTo(transactions::class);
    }
}
