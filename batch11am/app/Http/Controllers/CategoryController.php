<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "<h1>Hello</h1>";
        // $category = Category::all();
        // $category = Category::where('status','Active')->get();
        $category = Category::get();
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.create')->with("success", "Record Inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        $category = Category::find($id);
        return view("category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($request->all());
        // echo $id;

        $category = Category::find($id);
        $category->categoryName = $request->categoryName;
        $category->description = $request->description;
        $category->save();
        return redirect()->route("category.index")->with("success","REcord Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("category.index")->with("success","Record Deleted");
    }

    public function softdelete(Request $request){
        // print_r($request->all());
        $category = Category::find($request->id);
        if($category->status == "Active")
        {
            $category->status = "Inactive";
        }
        else{
            $category->status = "Active";
        }
        $category->save();
         return redirect()->route("category.index")->with("success","Status has been changed"); 
    }
}
