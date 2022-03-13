<?php

namespace App\Http\Controllers;
use App\Models\Testi;
use Validator;
use DataTables;
use Illuminate\Http\Request;

class TestiCont extends Controller
{
    public function be_testi(Request $request)
    {
        if ($request->ajax()) {
            $data = Testi::orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($data){
                    $image = '<img src="'.asset('img_testi/'.$data->img).'" width="100%" alt="">';
                    return $image;
                    // return '-';
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a data-toggle="modal" data-target="#modaledit" data-id="'.$data->id.'" data-name="'.$data->name.'" data-deskripsi="'.$data->deskripsi.'"
                    data-src="'.asset('img_testi/'.$data->img).'" data-img="'.$data->img.'" class="delete btn btn-info btn-sm"><i class="text-white fa fa-pencil"></i></a>';
                    $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-img="'.$data->img.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        };
        return view('be.testi');
    }

    public function be_testi_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'deskripsi'   => 'required',
            'img'       => 'nullable|mimes:jpeg,jpg,png,gif',
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
                $request->img->move(public_path('img_testi'), $filename);

                $data   = Testi::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'      => $request->name,
                        // 'slug'      => Str::slug($request->nama),
                        'deskripsi' => $request->deskripsi,
                        'img'     => $filename,
                    ]
                );
            }else {
                # code...
                $data   = Testi::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'      => $request->name,
                        // 'slug'      => Str::slug($request->nama),
                        'deskripsi' => $request->deskripsi,
                    ]
                );
            }
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Testimonial has been Added'
                ]
            );
        }
    }

    public function be_testi_dell(Request $request)
    {
        Testi::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Testimonial has been Removed'
            ]
        );
    }
}
