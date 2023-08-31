<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class filter extends Controller
{

    /* SEARCH BOX FOR PRODUCT NAME */
    public function search($data){
        $data = products::where('product_name','LIKE','%'.$data.'%')->get();
        return $data;
    }   


}
