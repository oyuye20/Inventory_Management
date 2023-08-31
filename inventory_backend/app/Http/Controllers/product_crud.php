<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class product_crud extends Controller
{

    /* READ ALL PRODUCT */
    public function index(){
        return products::orderBy('id')->paginate(2);
        
        /* return response()->json([
            'products' => $product,
            'code' => 200
        ]); */
    }


    /* ADD NEW PRODUCT */
    public function add_product(Request $request){
        $product = new products();
        $product->serial_number = $request->serial_number;
        $product->manufacturer = $request->manufacturer;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->stocks = $request->stocks;
        $product->production_date = $request->production_date;
        $product->expiration_date = $request->expiration_date;
        $product->save();

        return response()->json([
            'message' => 'Product added successfully'
        ]);
    }


    /* UPDATE A PRODUCT */
    public function update_product($id){
        $product = products::find($id);

        return response()->json([
            'product' => $product
        ]);
    }


    /* DELETE A PRODUCT */
    public function delete_product($id){
        $product = products::find($id);

        if($product)
        {
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully'
            ]);
        }

        else {
            return response()->json([
                'message' => 'Product does not exists'
                
            ]);
        }
    }

    /* SEARCH A PRODUCT */

    /* public function search_product(){
        $search = request('query');
        $product = products::where('product_name','like',"%{$search}%")->get();

        return response()->json($product);
    } */
}
