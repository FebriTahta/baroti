<?php

namespace App\Http\Controllers;
use App\Models\Linkbutton;
use DataTables;
use Illuminate\Http\Request;

class ButtonCont extends Controller
{
    public function be_button(Request $request)
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
        return view('be.button');
    }
}
