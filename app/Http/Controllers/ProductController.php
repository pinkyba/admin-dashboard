<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::where('name','like', 'o%')->get();
        return view('product',compact('products'));
    }

    // google chart
    public function get_all_products_for_pie_chart()
    {
        $products = Product::where('name','like', 'o%')->get();
        return view('pie',compact('products')); 
    }


    // google line chart
    public function google_line_chart()
    {
        $product = Product::select(

                    DB::raw("year(created_at) as year"),

                    DB::raw("SUM(sales) as total_sales"),

                    DB::raw("SUM(quantity) as total_qty")) 

                    ->orderBy(DB::raw("YEAR(created_at)"))

                    ->groupBy(DB::raw("YEAR(created_at)"))

                    ->get();

        $result[] = ['Year','Sale','Qty'];

        foreach ($product as $key => $value) {

            $result[++$key] = [$value->year, (int)$value->total_sales, (int)$value->total_qty];
        }

        return view('google-line-chart')->with('product',json_encode($result));
    }
}
