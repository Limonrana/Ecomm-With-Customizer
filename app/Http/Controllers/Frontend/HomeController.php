<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Cart;

class HomeController extends Controller
{


    public function index() {
        return view('pages.index');
    }



    public function single($slug, $id) {
        $single = Product::where('slug', $slug)->where('id', $id)->first();
        $desc = Str::limit($single->description, 500);
        return view('pages.single-shop', compact('single', 'desc'));
    }
}
