<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Landing;
use App\Models\About;
use App\Models\Bahan;
use App\Models\Ajakan;
use App\Models\Testi;
use App\Models\Keunggulan;
use Illuminate\Http\Request;

class LandingCont extends Controller
{
    public function landing(Request $request)
    {
        $slider = Slider::with('linkbutton')->get();
        $about  = About::first();
        $keunggulan  = Keunggulan::first();
        $bahan = Bahan::all();
        $ajakan = Ajakan::first();
        $testi = Testi::all();
        return view('fe.landing',compact('slider','about','keunggulan','bahan','ajakan','testi'));
    }
}
