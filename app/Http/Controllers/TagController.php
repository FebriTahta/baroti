<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use DataTables;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function be_tag(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Tag::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('opsi', function($data){
                        $actionBtn = ' <a href="#" type="button" data-p_id="'.$data->id.'" data-name="'.$data->name.'" data-toggle="modal" data-target="#modaledit" class="btn btn-sm btn-info text-white" ><i class="fa fa-pencil"></i> UPDATE</a>';
                        $actionBtn .= ' <a href="#" type="button" data-p_id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi'])
            ->make(true);
        }
        return view('be.tag');
    }

    public function be_tag_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name'       => 'required|max:50',           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Tag::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'     => $request->name,
                    'slug'      => Str::slug($request->name),
                ]
            );
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Tag has been Added'
                ]
            );
        }
    }

    public function be_tag_dell(Request $request)
    {
        $data = Tag::find($request->id);

        if ($data->product->count() > 0) {
            # punya product tidak bisa dihapus code...
            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => 'Tak bisa dihapus karena berhubungan dengan product',
            ]);
        }else {
            # hapus code...
            Tag::find($request->id)->delete();
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Tag has been Deleted'
                ]
            );
        }
    }
}
