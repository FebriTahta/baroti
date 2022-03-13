<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Validator;
use Image;
use File;
use Illuminate\Http\Request;

class ProfileCont extends Controller
{
    public function be_profile()
    {
        $data = Profile::first();
        return view('be.profile',compact('data'));
    }


    public function be_profile_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nama_web'        => 'required',
            // 'facebook'        => 'nullable',
            // 'twitter'         => 'nullable',
            // 'instagram'       => 'nullable',
            // 'telp'            => 'required',
            // 'alamat'          => 'required',
            'thumbnail_home'  => 'image|mimes:jpeg,jpg,png,gif|max:200',
            'image_header'    => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            if ($request->thumbnail_home !== null && $request->image_header !== null) {
                # code...
                $filename = time().'.'.$request->thumbnail_home->getClientOriginalExtension();
                $request->thumbnail_home->move(public_path('img_thumbnail'), $filename);

                $filename2 = time().'.'.$request->image_header->getClientOriginalExtension();
                $request->image_header->move(public_path('img_profile'), $filename2);

                $data   = Profile::updateOrCreate(
                    [
                        'id' => 1
                    ],
                    [
                        // 'nama_web'      => $request->nama_web,
                        // 'facebook'      => $request->facebook,
                        // 'twitter' => $request->twitter,
                        // 'instagram'     => $request->instagram,
                        // 'telp'     => $request->telp,
                        // 'alamat' => $request->alamat,
                        'thumbnail_home' => $filename,
                        'image_header' => $filename2,

                    ]
                );

            }elseif($request->thumbnail_home !== null && $request->image_header == null) {
                # code...
                $filename = time().'.'.$request->thumbnail_home->getClientOriginalExtension();
                $request->thumbnail_home->move(public_path('img_thumbnail'), $filename);

                $data   = Profile::updateOrCreate(
                    [
                        'id' => 1
                    ],
                    [
                        // 'nama_web'      => $request->nama_web,
                        // 'facebook'      => $request->facebook,
                        // 'twitter' => $request->twitter,
                        // 'instagram'     => $request->instagram,
                        // 'telp'     => $request->telp,
                        // 'alamat' => $request->alamat,
                        'thumbnail_home' => $filename,

                    ]
                );
            }elseif ($request->thumbnail_home == null && $request->image_header !== null) {
                # code...
                $filename2 = time().'.'.$request->image_header->getClientOriginalExtension();
                $request->image_header->move(public_path('img_profile'), $filename2);

                $data   = Profile::updateOrCreate(
                    [
                        'id' => 1
                    ],
                    [
                        // 'nama_web'      => $request->nama_web,
                        // 'facebook'      => $request->facebook,
                        // 'twitter' => $request->twitter,
                        // 'instagram'     => $request->instagram,
                        // 'telp'     => $request->telp,
                        // 'alamat' => $request->alamat,
                        'image_header' => $filename2,

                    ]
                );
            }else {
                # code...
                // $data   = Profile::updateOrCreate(
                //     [
                //         'id' => $request->id
                //     ],
                //     [
                //         'nama_web'      => $request->nama_web,
                //         'facebook'      => $request->facebook,
                //         'twitter' => $request->twitter,
                //         'instagram'     => $request->instagram,
                //         'telp'     => $request->telp,
                //         'alamat' => $request->alamat,

                //     ]
                // );
            }
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Profile HAs Been Updated'
                ]
            );
        }
    }

}
