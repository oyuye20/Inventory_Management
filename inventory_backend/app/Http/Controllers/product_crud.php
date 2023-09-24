<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\transactions;
use App\Models\customer_orders;
use Illuminate\Support\Facades\DB;

class product_crud extends Controller
{

    /* READ ALL PRODUCT */
    public function index(){
        return products::orderBy('id')->paginate(5);
        
        /* return response()->json([
            'products' => $product,
            'code' => 200
        ]); */
    }


    public function sample(){
        return transactions::with('customer_orders')->get();
    }


    /* CHECKOUT */
    public function checkout(Request $request){      
        $r = json_decode($request->input("cart"),true);

        $s = $request->input("grand_total");
        $converted = substr($s,3);
        $final_total = str_replace(',', '', $converted);


        $transactions = transactions::create([ 
            "customer_name" => $request->input("customer_name"),
            "gross_total" => $request->input("sub_total"),
            "discount" => "0",
            "net_total" => $final_total,
            "purchase_date" => $request->input("purchase_date"),
            "status" => "Paid",
        ]);


        foreach($r as $values) {

             customer_orders::create([
                "transactions_id" => $transactions->id,
                "product_name" => $values['product_name'],
                "quantity" => $values['quantity'],
                "price" => $values['price'],
                "total" => $values['total'],
            ]);


            $stock_update = $values['stocks'] - $values['quantity'];

            $update_quantity = DB::table('products')
            ->where('id', $values['product_id'])
            ->update(['stocks' => $stock_update]);
            
         } 

        



        return response()->json([
            'code' => 200
        ]);
        
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
        $product->price = $request->price;
        $product->production_date = $request->production_date;
        $product->expiration_date = $request->expiration_date;
        $product->save();

        return response()->json([
            'message' => 'Product added successfully'
        ]);
    }


    /* UPDATE A PRODUCT */
    public function index_update_product($id){
        $product = products::find($id);

        return response()->json([
            'edit_prod' => $product
        ]);
    }


    /* FOR UPDATING THE PRODUCT ITSELF */
    public function action_update_product(Request $request,$id){
        $product = products::find($id)->update($request->all());

        if($product){
            return response()->json([
                'message' => 'Product updated successfully'
            ]);
        }
        else
        {

        }
     
        
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
