<?php

namespace App\Http\Controllers;
use App\Models\Bahan;
use Validator;
use DataTables;
use Illuminate\Http\Request;

class BahanCont extends Controller
{
    public function be_bahan(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Bahan::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('img', function($data){
                        $url=asset("img_bahan/".$data->img); 
                        return '<img src='.$url.' border="0" width="100px" class="img-rounded" align="center" />'; 
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn = ' <a href="#" type="button" data-p_id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','img'])
            ->make(true);
        }

        return view('be.bahan');
    }

    public function be_bahan_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deskripsi' => 'required',
            'img'       => 'required|mimes:jpeg,jpg,png,gif',           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $filename = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('img_bahan'), $filename);

            $data   = Bahan::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'img'     => $filename,
                    'name'          => $request->name,
                    'deskripsi'          => $request->deskripsi,
                ]
            );
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Bahan has been Added'
                ]
            );
        }
    }

    public function be_bahan_dell(Request $request)
    {
        //FIND
        Bahan::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Bahan has been Removed'
            ]
        );
        
    }
}
