<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Validator;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamCont extends Controller
{
    public function be_team(Request $request)
    {
        if ($request->ajax()) {
            $data = Team::orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($data){
                    $image = '<img src="'.asset('img_team/'.$data->img).'" width="100%" alt="">';
                    return $image;
                    // return '-';
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a data-toggle="modal" data-target="#modaledit" data-id="'.$data->id.'" data-nama="'.$data->nama.'" data-jabatan="'.$data->jabatan.'"
                    data-src="'.asset('img_team/'.$data->img).'" data-img="'.$data->img.'" class="delete btn btn-info btn-sm"><i class="text-white fa fa-pencil"></i></a>';
                    $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-img="'.$data->img.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        };

        return view('be.team');
    }

    public function be_team_dell(Request $request)
    {
        Team::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Team has been Deleted'
            ]
        );
    }

    public function be_team_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'jabatan'   => 'required',
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
                $request->img->move(public_path('img_team'), $filename);

                $data   = Team::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'nama'      => $request->nama,
                        'slug'      => Str::slug($request->nama),
                        'jabatan' => $request->jabatan,
                        'img'     => $filename,
                    ]
                );
            }else {
                # code...
                $data   = Team::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'nama'      => $request->nama,
                        'slug'      => Str::slug($request->nama),
                        'jabatan' => $request->jabatan,
                    ]
                );
            }
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Team has been Added'
                ]
            );
        }
    }
} 
