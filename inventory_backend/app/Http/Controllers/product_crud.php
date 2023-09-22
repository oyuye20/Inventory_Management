<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\transactions;
use App\Models\customer_orders;

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



    public function sample2(Request $request){
        
        $r = json_decode($request->getContent(),true);

         $transactions = transactions::create([
            "customer_name" => "name",
            "gross_total" => "name",
            "discount" => "name",
            "net_total" => "name",
            "purchase_date" => "2023-11-10",
            "status" => "name",
        ]);


        foreach($r as $values) {
            customer_orders::create([
                "transactions_id" => $transactions->id,
                "product_name" => $values['product_name'],
                "quantity" => $values['quantity'],
                "price" => $values['price'],
                "total" => $values['total'],
            ]);
         }


        return response()->json([
            'code' => 200
        ]);


        /* $transactions = new transactions();
        $transactions->customer_name = $request->customer_name;
        $transactions->gross_total = $request->gross_total;
        $transactions->discount = $request->discount;
        $transactions->net_total = $request->net_total;
        $transactions->purchase_date = $request->purchase_date;
        $transactions->status = $request->status;
        $transactions->save(); */

        /* $transactions = transactions::create([
            "customer_name" => "name",
            "gross_total" => "name",
            "discount" => "name",
            "net_total" => "name",
            "purchase_date" => "2023-11-10",
            "status" => "name",
        ]); */


        

       
       

        

       /*  $customer = $request->all();
  
        $user = transactions::create([
            "customer_name" => "name",
            "gross_total" => "name",
            "discount" => "name",
            "net_total" => "name",
            "purchase_date" => "2023-11-10",
            "status" => "name",
        ]);



            ;
 */



       /*  $test = json_decode($request->getContent(), true);
 */

        
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
