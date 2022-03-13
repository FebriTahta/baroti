<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Ajakan;
use DataTables;
use App\Models\Linkbutton;
use Illuminate\Http\Request;

class AjakanCont extends Controller
{
    public function be_ajakan(Request $request)
    {
        if ($request->ajax()) {
            $data = Linkbutton::orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('links', function($data){
                    $links = '<a href="'.$data->link.'" class="btn btn-sm" style="background-color: pink"></a>';
                    return $links;
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a data-toggle="modal" data-target="#modaledit" data-id="'.$data->id.'" data-name="'.$data->name.'" data-link="'.$data->link.'"
                     class="delete btn btn-info btn-sm"><i class="text-white fa fa-pencil"></i></a>';
                    $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','links'])
                ->make(true);
        };
        $linkbutton = Linkbutton::all();
        $ajakan = Ajakan::first();
        return view('be.ajakan',compact('ajakan','linkbutton'));
    }

    public function be_ajakan_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'       => 'required',
            'heading'       => 'required',
            'deskripsi'         => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Ajakan::updateOrCreate(
                [
                    'id' => 1
                ],
                [
                    'judul'      => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'heading'     => $request->heading,
                ]
            );
        }
        if ($request->linkbutton_id !== null) {
            # code...
            $ya;
            foreach ($request->linkbutton_id as $key => $value) {
                # code...
                $ya[] = $value;
            }
            $data->linkbutton()->sync($ya);
        }
    
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Aakan has been Added'
            ]
        );
    }

    public function be_link_button_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'link'   => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Linkbutton::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'      => $request->name,
                    'link' => $request->link,
                ]
            );
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Link Button has been Added'
                ]
            );
        }
    }

    public function be_link_button_dell(Request $request)
    {
        $data = Linkbutton::find($request->id);
        $data->ajakan()->detach();
        $data->slider()->detach();
        $data->product()->detach();
        Linkbutton::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Link Button has been Deleted'
            ]
        );

    }

    public function tes(Request $request)
    {
        $ya;
        foreach ($request->linkbutton_id as $key => $value) {
            # code...
            $ya[] = $value;
        }
        $ok = Ajakan::find(1)->linkbutton()->sync($ya);
        return $ok;
    }
}
