<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function create(){
        return view('category.create');
    }
    function store(Request $request){
        // dd($request);
        $this->validate($request,['name'=>'required|unique:categories']);
        Category::create(['name'=>$request->input('name')]);
        return redirect()->route('category.create');        
    }
    function index(){
        $categories=Category::paginate(2);
        // dd($categories);
        return view('category.index',compact('categories'));
    }
    function destroy($id){
        $category=Category::find($id);
        if($category){
            $category->delete();
        }
        return redirect()->route('category.index');
    }
    function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
    function update(Request $request,$id){
        $category = Category::find($id);
        $category->name=$request->input('name');
        $category->update();
        return redirect()->route('category.index');
    }

}
