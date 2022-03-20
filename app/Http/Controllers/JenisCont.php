<?php

namespace App\Http\Controllers;
use App\Models\Jenis;
use DataTables;
use Validator;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JenisCont extends Controller
{
    public function be_jenis(Request $request)
    {
        if(request()->ajax())
        {
        $data   = Jenis::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('opsi', function($data){
                        $actionBtn = ' <a href="#" type="button" data-id="'.$data->id.'" data-name="'.$data->name.'" data-toggle="modal" data-target="#modaledit" class="btn btn-sm btn-warning text-white" syle="margin-right=5px; margin-bottom=5px; text-decoration-color=white"><i class="fa fa-pencil"></i> EDIT</a>';
                        $actionBtn .= ' <a href="#" type="button" data-p_id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger text-white" style="margin-right=5px; margin-bottom=5px"><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi'])
            ->make(true);
        }

        return view('be.jenis');
    }

    public function be_jenis_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $datas = Jenis::where('name', $request->name)->first();
            if ($datas == null) {
                # code...
                $data   = Jenis::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'          => $request->name,
                        'slug'      => Str::slug($request->name),
                    ]
                );
            
                return response()->json(
                    [
                      'status'  => 200,
                      'message' => 'Jenis Kategori Blog has been Added'
                    ]
                );
            }else {
                # code...
                return response()->json(
                    [
                      'status'  => 400,
                      'message' => 'Nama Kategori tersebut sudah ada'
                    ]
                );
            }
            
        }
    }

    public function be_jenis_dell(Request $request)
    {
        $blog = Blog::where('jenis_id', $request->id)->first();
        if ($blog !== null) {
            # code...
            return response()->json([
                'status' => 400,
                'message'  => 'Tidak dapat menghapus kategori ini',
            ]);
        }else {
            # code...
            $jenis = Jenis::find($request->id)->delete();
            return response()->json([
                'status' => 200,
                'message'  => 'Kategori has been Removed',
            ]);
        }
    }
}
