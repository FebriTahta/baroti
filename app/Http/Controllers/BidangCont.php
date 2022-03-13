<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use Validator;
use Illuminate\Http\Request;

class BidangCont extends Controller
{
    public function be_bidang(Request $request)
    {
        $bidang = Bidang::first();
        return view('be.bidang',compact('bidang'));
    }

    public function be_bidang_post(Request $request)
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
            $data   = Bidang::updateOrCreate(
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
                  'message' => 'About Us has been Added'
                ]
            );
        }
    }
}
