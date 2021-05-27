<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.pages.inventory.category.category', compact('category'));
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
            'name' => 'required|unique:categories|max:55',
        ]);

        if ($request->image) {
            $getImage       = $request->image;
            $smallImage     = 'small_' . uniqid() . '.' . $getImage->getClientOriginalExtension();
            $mediumImage    = 'medium_'. uniqid() . '.' . $getImage->getClientOriginalExtension();
            $largeImage     = 'large_'. uniqid() .'.' . $getImage->getClientOriginalExtension();
            // resizing an uploaded file
            Image::make($getImage)->resize(150, 150)->save(public_path('uploads/small/' . $smallImage));
            Image::make($getImage)->resize(525, 280)->save(public_path('uploads/medium/' . $mediumImage));
            Image::make($getImage)->save(public_path('uploads/large/' . $largeImage));
            $image                  = new Photo();
            $image->small           = 'uploads/small/' . $smallImage;
            $image->medium          = 'uploads/medium/' . $mediumImage;
            $image->large           = 'uploads/large/' . $largeImage;
            $image->save();
            $img_id = $image->id;
        }
        $category           = new Category();
        $category->name     = $request->name;
        $category->slug     = Str::of($request->name)->slug('-');
        if ($request->image) {
            $category->image_id = $img_id;
        }
        $category->save();
        $notification=array(
            'alert'=>'Category successfully created.',
            'alert-type'=>'success'
        );
        return redirect()->route('category.index')->with($notification);
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
        $category = Category::with('photo')->find($id);
        return response()->json($category);
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
        $id = $request->id;
        $category = Category::find($id);
        if ($request->editImage) {
            if ($category->image_id != null) {
                $photo = Photo::find($category->image_id);
                unlink($photo->small);
                unlink($photo->medium);
                unlink($photo->large);
                $photo->delete();
            }
            $getImage       = $request->editImage;
            $smallImage     = 'small_' . uniqid() . '.' . $getImage->getClientOriginalExtension();
            $mediumImage    = 'medium_'. uniqid() . '.' . $getImage->getClientOriginalExtension();
            $largeImage     = 'large_'. uniqid() .'.' . $getImage->getClientOriginalExtension();
            // resizing an uploaded file
            Image::make($getImage)->resize(150, 150)->save(public_path('uploads/small/' . $smallImage));
            Image::make($getImage)->resize(525, 280)->save(public_path('uploads/medium/' . $mediumImage));
            Image::make($getImage)->save(public_path('uploads/large/' . $largeImage));
            $image                  = new Photo();
            $image->small           = 'uploads/small/' . $smallImage;
            $image->medium          = 'uploads/medium/' . $mediumImage;
            $image->large           = 'uploads/large/' . $largeImage;
            $image->save();
            $img_id = $image->id;
        }
        $category->name     = $request->name;
        $category->slug     = Str::of($request->name)->slug('-');
        if ($request->editImage) {
            $category->image_id = $img_id;
        }
        $category->save();
        $notification=array(
            'alert'=>'Category successfully updated.',
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
        $category = Category::find($id);
        if ($category->image_id != null) {
            $photo = Photo::find($category->image_id);
            unlink($photo->small);
            unlink($photo->medium);
            unlink($photo->large);
            $photo->delete();
        }
        $category->delete();
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
            $category = Category::find($id);
            if ($category->image_id != null) {
                $photo = Photo::find($category->image_id);
                unlink($photo->small);
                unlink($photo->medium);
                unlink($photo->large);
                $photo->delete();
            }
            $category->delete();
        }
    }
}
