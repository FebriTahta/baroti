<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Profile;
use Validator;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamCont extends Controller
{
    public function team(Request $request)
    {
        $team = Team::all();
        $profile = Profile::first();
        return view('fe.team',compact('team','profile'));
    }

    public function be_team_exp($id_team)
    {
        $team = Team::find($id_team);
        return view('be.team_exp',compact('team'));
    }
    
    public function be_teamexp_add(Request $request)
    {
        Team::find($request->id)->update(['deskripsi'=>$request->deskripsi]);
        return redirect('/admin-our-team');
    }

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
                ->addColumn('exp', function($data){
                    
                    if ($data->deskripsi !== null) {
                        # code...
                        return 'ok';
                    }else {
                        # code...
                        return 'null';
                    }
                })
                ->addColumn('action', function($data){
                    $actionBtn = ' <a data-toggle="modal" data-target="#modaledit" data-id="'.$data->id.'" data-nama="'.$data->nama.'" data-jabatan="'.$data->jabatan.'"
                    data-src="'.asset('img_team/'.$data->img).'" data-img="'.$data->img.'" class="delete btn btn-info btn-sm"><i class="text-white fa fa-pencil"></i></a>';
                    $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-img="'.$data->img.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    $actionBtn.= ' <a href="/admin-our-team-exp/'.$data->id.'" class="info btn btn-info btn-sm text-white"><i>exp</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','image','exp'])
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
