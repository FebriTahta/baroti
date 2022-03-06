<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingCont extends Controller
{
    public function landing(Request $request)
    {
        $slider = Slider::all();
        $product= Product::orderBy('id','desc')->limit(4)->get();
        return view('fe.home',compact('slider','product'));
    }
}
