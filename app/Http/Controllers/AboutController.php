<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Bidang;
use App\Models\Team;
use Validator;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $bidang= Bidang::first();
        $team = Team::all();
        return view('fe.about',compact('about','bidang','team'));
    }

    public function be_about(Request $request)
    {
        $about = About::first();
        return view('be.about',compact('about'));
    }

    public function be_about_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'       => 'required',
            'deskirpsi'   => 'required',
            'img'         => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            if ($request->img !== null) {
                # code...
                $filename = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('img_about'), $filename);

                $data   = About::updateOrCreate(
                    [
                        'id' => 1
                    ],
                    [
                        'judul'      => $request->judul,
                        'deskirpsi' => $request->deskirpsi,
                        'img'     => $filename,
                    ]
                );
            }else {
                # code...
                $data   = About::updateOrCreate(
                    [
                        'id' => 1
                    ],
                    [
                        'judul'      => $request->judul,
                        'deskirpsi' => $request->deskirpsi,
                    ]
                );
            }
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'About Us has been Added'
                ]
            );
        }
    }
}
