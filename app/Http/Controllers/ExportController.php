<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use PDF;
use Illuminate\Support\Facades\Artisan;
use App\Rabbit;

class ExportController extends Controller
{
    // export to pdf
    public function downloadPDF()
    {

         $categories = Category::orderBy('id','desc')->get();
         $pdf = PDF::loadView('test',compact('categories'));
        
        // // download PDF file with download method
        // return $pdf->download('category.pdf');

        //$cat = mb_convert_encoding('အောင်မြင်', 'HTML-ENTITIES', 'UTF-8');
        //$cat = $this->uni2zawgyi('မြန်မာစာ');
        //$pdf = PDF::loadView('test',compact('cat'));
        
        return $pdf->download('test.pdf');
    }

    public function uni2zawgyi($str){
        return Rabbit::uni2zg($str);
    }


    // export data.sql file
    public function download(){

     Artisan::call('backup:run'); // cmd for extractin database.sql file

     $path = storage_path('app/Laravel-Admin/*'); // save in storage/app/Laravel-Admin
     $latest_ctime = 0;
     $latest_filename = '';
     $files = glob($path);
     foreach($files as $file)
     {
         if (is_file($file) && filectime($file) > $latest_ctime)
         {
                 $latest_ctime = filectime($file);
                 $latest_filename = $file;
         }
     }
     return response()->download($latest_filename);
    }


    // Echart test
    public function showEchart()
    {
        $products = Product::where('name','like', 'o%')->get();
        return view('echart_bar', compact('products'));
    }


    public function googleMap(){
        return view('googlemap');
    }

}
