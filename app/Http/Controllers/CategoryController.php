<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use PDF;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // Validation
        $request->validate([
            "name" => "required",
            "photo" => "required|mimes:jpg,jpeg,png",
        ]);

        //upload
        //category photo
        if($request->file('photo')){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            
            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName, 'public');
            
            $path = '/storage/'.$filePath;
            
        }


        // icon photo
        if($request->file('icon')){
            $iconfileName = time().'_'.$request->icon->getClientOriginalName();
            $iconfilePath = $request->file('icon')->storeAs('iconimg',$iconfileName, 'public');
            $iconpath = '/storage/'.$iconfilePath;           
        }
        else{
            $iconpath = null;
        }


        //store data into Category model
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $path;
        $category->status = $request->status;
        $category->icon = $iconpath;
        $category->save();

        //return
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request);

        // Validation
        $request->validate([
            "name" => "required",
            "oldphoto" => "required",
            "photo" => "mimes:jpg,jpeg,png"            
        ]);

        //category photo
        if($request->file('photo')){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            
            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName, 'public');
            
            $path = '/storage/'.$filePath;
            
        }
        else{
            $path = $request->oldphoto;           
        }

        // icon photo
        if($request->file('icon')){
            $iconfileName = time().'_'.$request->icon->getClientOriginalName();
            $iconfilePath = $request->file('icon')->storeAs('iconimg',$iconfileName, 'public');
            $iconpath = '/storage/'.$iconfilePath;
            
        }
        else{
            $iconpath = $request->icon_oldphoto;           
        }

        //update data into Category model
        $category->name = $request->name;
        $category->photo = $path;
        $category->status = $request->status;
        $category->icon = $iconpath;
        $category->save();

        //return
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        //return
        return redirect()->route('categories.index');
    }

}
