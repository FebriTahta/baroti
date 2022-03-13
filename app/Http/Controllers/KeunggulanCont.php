<?php

namespace App\Http\Controllers;
use App\Models\Keunggulan;
use Validator;
use Illuminate\Http\Request;

class KeunggulanCont extends Controller
{
    public function be_keunggulan()
    {
        $keunggulan = Keunggulan::first();
        return view('be.keunggulan',compact('keunggulan'));
    }

    public function be_keunggulan_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'       => 'required',
            'deskripsi'   => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Keunggulan::updateOrCreate(
                [
                    'id' => 1
                ],
                [
                    'judul'      => $request->judul,
                    'deskripsi' => $request->deskripsi,
                ]
            );
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Keunggulan Us has been Added'
                ]
            );
        }
    }
}
