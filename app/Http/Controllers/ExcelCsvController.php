<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Excel;
use App\Exports\ExcelCsvExport;

class ExcelCsvController extends Controller
{   
    //show product
    public function index($value='')
    {
        $products = Product::all();
        return view('excel', compact('products'));
    }

    // export excel file
    public function exportExcel($value='')
    {
        return Excel::download(new ExcelCsvExport, 'products.xlsx');
    }

    // export csv file
    public function exportCsv($value='')
    {
        return Excel::download(new ExcelCsvExport, 'products.csv');
    }
}
