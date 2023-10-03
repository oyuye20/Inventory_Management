<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product_info;

class inventory extends Controller
{
    public function inventory_index(){
        return DB::table('product_infos')
        ->join('inventory','product_infos.id', '=','inventory.product_id')

        ->select('inventory.production_date', 'inventory.expiration_date', 
        'inventory.product_id', 'product_name', 
        'price', DB::raw('sum(inventory.stocks) as stocks') )
   
        ->groupBy('inventory.product_id','product_infos.price',
        'product_infos.product_name','inventory.expiration_date',
        'inventory.production_date')

        ->paginate(1);
    }


    public function create_category(Request $request){
        category::create([
            "category" => $request->input("category"),
            "description" => $request->input("description"),
        ]);

         return response()->json([
            "status" => 200
         ]);
    }


    public function index_category(){
        return category::orderBy('id')->paginate(5);
    }



    public function get_update_cat($id){
        $category = category::find($id);

        return response()->json([
            'edit_cat' => $category
        ]);
    }



    public function update_category(Request $request,$id){
        
        /* $category = category::find($id)
        ->update([
            'category' => $request->input('category'),
            'description' => $request->input('description'),
        ]);


        if($category){
            return response()->json([
                'message' => 'category updated successfully'
            ]);
        } */
    }






    public function delete_category(){
        
    }



}
