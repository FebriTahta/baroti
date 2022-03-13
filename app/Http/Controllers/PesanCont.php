<?php

namespace App\Http\Controllers;
use App\Models\Pesan;
use DataTables;
use Illuminate\Http\Request;

class PesanCont extends Controller
{
    public function submit_pesan(Request $request){
       
        $data   = Pesan::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name'     => $request->name,
                'telp'          => $request->telp,
                'email'          => $request->email,
                'pesantext'  => $request->pesantext
            ]
        );

        return redirect()->back()->with('success', 'Pesan anda telah kami terima mohon menunggu balasan pesan dari kami melalui email / no telp anda yang telah dicantumkan');  
    }

    public function be_pesan(Request $request)
    {
        if ($request->ajax()) {
            $data = Pesan::orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = ' <a data-toggle="modal" data-target="#modaledit" data-id="'.$data->id.'" data-name="'.$data->name.'" data-pesantext="'.$data->pesantext.'"
                     class="delete btn btn-info btn-sm"><i class="text-white fa fa-eye"></i></a>';
                    $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        };
        return view('be.pesan');
    }

    public function be_pesan_dell(Request $request)
    {
        Pesan::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Pesan has been Removed'
            ]
        );

    }
}
