<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class filter extends Controller
{

    /* SEARCH BOX FOR PRODUCT NAME */
    public function search($data){
        $data = products::where('product_name','LIKE','%'.$data.'%')
        ->orWhere('serial_number','LIKE','%'.$data.'%')
        ->orWhere('manufacturer','LIKE','%'.$data.'%')
        ->get();

         return response()->json([
            'search' => $data,
            'code' => 200
        ]);
    }   


}
