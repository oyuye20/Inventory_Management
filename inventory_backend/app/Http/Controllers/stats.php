<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\transactions;
use Illuminate\Support\Facades\DB;

class stats extends Controller
{
    

    /* FOR TOTAL NUMBER OF PRODUCTS IN DASHBOARD*/
    public function total_prod(){
        $product_count = products::count();

        return response()->json([
            'product_count' => $product_count,
            'code' => 200
        ]);
    }


    /* REMINDER OF EXPIRED PRODUCTS WITH PAGINATION*/
    public function expiration(){
        return products::whereDate('expiration_date', '<', now())->paginate(5);

       /*  return response()->json([
            'expiration_date' => $p,
            'code' => 200
        ]); */

    }


    /* NUMBER OF EXPIRED PRODUCTS */
    public function expired_count(){
        $p = products::whereDate('expiration_date', '<', now())->count();

        return response()->json([
            'exp_count' => $p,
            'code' => 200
        ]);

    }


    /* TOTAL OF SUM STOCKS IN DASHBOARD*/
    public function stock_total(){
        $total_stock = products::select('stocks')->sum('stocks');

        return response()->json([
            'stock_total' => $total_stock,
            'code' => 200
        ]);
    }



    /* NUMBER OF CRITICAL STOCKS IN DASHBOARD*/
    public function critical_stocks(){
        $safe_stocks = 30;
        $crit = products::where('stocks', '<', $safe_stocks)->count();


        return response()->json([
            'crit' => $crit,
            'code' => 200
        ]);

    }



    /* REMINDER OF LOW STOCKS */
    public function stocks(){
        $safe_stocks = 30;
        $stock = products::where('stocks', '<', $safe_stocks)->get();

        return response()->json([
            'stocks' => $stock,
            'code' => 200
        ]);

    }


    /* TOTAL SALES ITEMS */

    public function total_sales(){
        $sum = DB::table('transactions')->sum('net_total');

        return response()->json([
            'total_sales' => $sum,
            'code' => 200
        ]);
    }

    public function sold_items(){

        /* SELECT
        pi.id,
        pi.product_name,
        pi.price,
        inv.id,
        SUM(inv.stocks) AS total_quantity
        FROM
            product_info pi
        JOIN
            inventory inv
        ON
            pi.id = inv.product_id
        GROUP BY
            pi.id, pi.product_name, pi.price, inv.product_id
         HAVING
    		SUM(inv.stocks) < 100; */



       /*  $sold = DB::table('inventory')->groupBy('product_name')
        ->selectRaw('product_name,sum(quantity) as sold_items')
        ->orderBy('quantity', 'ASC')
        ->get();
 */

        $sold = DB::table('customer_orders')
        ->selectRaw('product_name,sum(quantity) as sold_items, sum(total) as money')
        ->orderBy('money', 'DESC')
        ->groupBy('product_name')
        ->get();
        

        return response()->json([
            'sold' => $sold,
            'code' => 200
        ]);
    }


}
