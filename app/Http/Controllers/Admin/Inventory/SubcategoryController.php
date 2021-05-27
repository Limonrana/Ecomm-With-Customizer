<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = Subcategory::all();
        $category = Category::all();
        return view('admin.pages.inventory.subcategory.subcategory', compact('subcategory', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:subcategories|max:55',
        ]);
        $subcategory           = new Subcategory();
        $subcategory->name              = $request->name;
        $subcategory->slug              = Str::of($request->name)->slug('-');
        $subcategory->category_id       = $request->category_id;
        $subcategory->save();
        $notification=array(
            'alert'=>'Subcategory successfully created.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
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
        $subcategory = Subcategory::find($id);
        return response()->json($subcategory);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryUpdate(Request $request) {
        $id                             = $request->id;
        $subcategory                    = Subcategory::find($id);
        if ($subcategory->name != $request->name) {
            $subcategory->name              = $request->name;
            $subcategory->slug              = Str::of($request->name)->slug('-');
        }
        if ($request->category_id != "Choose One") {
            $subcategory->category_id       = $request->category_id;
        }
        $subcategory->save();
        $notification=array(
            'alert'=>'Subcategory successfully updated.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory= Subcategory::find($id);
        $subcategory->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $all_id = $request->id;
        foreach($all_id as $id){
            $subcategory= Subcategory::find($id);
            $subcategory->delete();
        }
    }
}
