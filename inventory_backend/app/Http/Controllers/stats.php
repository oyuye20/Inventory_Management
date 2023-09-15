<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;


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






}
