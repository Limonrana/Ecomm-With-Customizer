<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute;
use App\Models\Admin\Photo;
use App\Models\Admin\Variation;
use Illuminate\Http\Request;
use Image;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Attribute::all();
        return view('admin.pages.inventory.attribute.variation', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->storeData($request);
        if ($data) {
            $notification=array(
                'alert'=>'Product variation successfully created.',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Attribute::find($id);
        return view('admin.pages.inventory.attribute.new-variation', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editData($id, $v_id)
    {
        $collection = Attribute::find($id);
        $variant = Variation::find($v_id);
        return view('admin.pages.inventory.attribute.edit-variation', compact('collection', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request, $id)
    {
        $this->storeData($request, $id);

        $notification=array(
            'alert'=>'Product variation successfully Updated.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'material_value'        => 'required|max:55',
            'material_code'         => 'required|max:55',
            'attribute_id'          => 'required',
            'price'                 => 'required',
            'sku'                   => 'required|unique:variations,sku,'.$id,
        ]);
        $variant                    = Variation::find($id);
        $variant->material_value    = $request->material_value;
        $variant->material_code     = $request->material_code;
        $variant->sku               = $request->sku;
        $variant->stock             = $request->stock;
        $variant->price             = $request->price;
        $variant->save();
        $notification=array(
            'alert'=>'Product variation successfully updated.',
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
        $variant = Variation::find($id);
        $variant->delete();
        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDelete($id)
    {
        $variant = Variation::where('material_image_id', $id)->ORWhere('care_image_id', $id)->first();
        if ($variant->material_image_id == $id) {
            $variant->material_image_id = null;
        } else {
            $variant->care_image_id = null;
        }
        $variant->save();

        $photo = Photo::find($id);
        unlink($photo->small);
        unlink($photo->medium);
        unlink($photo->large);
        $photo->delete();
    }


    /**
     * Store a newly created resource in storage Or Update with methods.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeData($request, $id = null)
    {
        $validatedData = $request->validate([
            'material_value'    => 'required|max:55',
            'material_code'     => 'required|max:55',
            'attribute_id'      => 'required',
            'price'             => 'required',
            'sku'               => 'unique:variations,sku,'.$id,
        ]);
        if ($id == null) {
            $variant                         = new Variation();
        } else {
//            $validatedData = $request->validate([
//                'value'             => 'required|max:55',
//                'attribute_id'      => 'required',
//                'price'             => 'required',
//                'sku'               => 'unique:variations,sku,'.$id,
//            ]);
            $variant                = Variation::find($id);
        }
        $variant->attribute_id           = $request->attribute_id;
        $variant->material_value         = $request->material_value;
        $variant->material_code          = $request->material_code;
        $variant->sku                    = $request->sku;
        $variant->stock                  = $request->stock;
        $variant->cushion_option         = $request->cushion_option;
        $variant->lateral_option         = $request->lateral_option;
        $variant->central_option         = $request->central_option;
        $variant->price                  = $request->price;
        $variant->description            = $request->description;

        if (empty($request->material_image)) {
            $variant->material_color     = $request->material_color;
        } elseif ($id != null) {
            $variant->material_color     = null;
        }

        //Image Upload And Delete Code
        if ($request->material_image) {
            $getImage = $variant->material_image_id ?? 0;
            $getId = $this->uploadImage($request->material_image, $getImage);
            $variant->material_image_id   = $getId;
        }
        if ($request->care_image) {
            $getImage = $variant->care_image_id ?? 0;
            $getId = $this->uploadImage($request->care_image, $getImage);
            $variant->care_image_id = $getId;
        }
        $variant->save();
        return true;
    }

    /**
     * Photo Upload Methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImage($image, $id=null)
    {
        if ($id != null) {
            if ($id != 0) {
                $photo = Photo::find($id);
                unlink($photo->small);
                unlink($photo->medium);
                unlink($photo->large);
                $photo->delete();
            }
        }
        $smallImage     = 'small_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $mediumImage    = 'medium_'. uniqid() . '.' . $image->getClientOriginalExtension();
        $largeImage     = 'large_'. uniqid() .'.' . $image->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($image)->resize(250, 200)->save(public_path('uploads/small/' . $smallImage));
        Image::make($image)->resize(270, 360)->save(public_path('uploads/medium/' . $mediumImage));
        Image::make($image)->save(public_path('uploads/large/' . $largeImage));
        $photo                  = new Photo();
        $photo->small           = 'uploads/small/' . $smallImage;
        $photo->medium          = 'uploads/medium/' . $mediumImage;
        $photo->large           = 'uploads/large/' . $largeImage;
        $photo->save();
        $img_id = $photo->id;
        return $img_id;
    }
}
