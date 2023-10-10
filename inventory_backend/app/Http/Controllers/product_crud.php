<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\transactions;
use App\Models\customer_orders;
use App\Models\product_info;
use App\Models\category;
use App\Models\inventory;
use Illuminate\Support\Facades\DB;

class product_crud extends Controller
{

    /* READ ALL PRODUCT */
    public function index(){
/*         return category::orderBy('id')->paginate(5); */
        return product_info::with('category')->where('isArchived',0)->paginate(5);
        
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


        /* UPDATE inventories SET stocks = stocks - 5 WHERE product_id = 1 */


            inventory::where('product_id', $values['product_id'])->decrement('stocks',$values['quantity']);


            /* $update_quantity = DB::table('inventories')
            ->where('product_id', $values['product_id'])
            ->update(['stocks' => $values['quantity']]); */

            
            /* return $update_quantity = DB::table('inventory')
            ->select('product_id','product_id','stocks'
            ,DB::raw('MAX(created_at) as old'))

            ->where('product_id','=',1)
            ->update(['votes' => 1]); */
        

           /*  return $update_quantity = DB::table('inventory')
            ->select('product_id','stocks')
            ->groupBy('product_id', 'stocks')
            ->get(); */
            /* ->update(['stocks' => $stock_update]); */
            
         } 


        return response()->json([
            'code' => 200
        ]);
        
    }





    /* ADD NEW PRODUCT */
    public function add_product(Request $request){

        $product = new product_info();
        $product->category_id = $request->category;
        $product->serial_number = $request->serial_number;
        $product->manufacturer = $request->manufacturer;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'message' => 'Product added successfully'
        ]);
    }


    /* UPDATE A PRODUCT */
    public function index_update_product($id){
        $product = product_info::find($id);

        return response()->json([
            'edit_prod' => $product
        ]);
    }


    /* FOR UPDATING THE PRODUCT ITSELF */
    public function action_update_product(Request $request,$id){
        $product = product_info::find($id)->update($request->all());

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
        $product  = product_info::find($id);

        $product->isArchived = '1';
        $product->save();

        if($product)
        {
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
