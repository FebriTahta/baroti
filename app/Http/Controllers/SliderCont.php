<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Linkbutton;
use DataTables;
use Validator;
use File;
use Illuminate\Http\Request;

class SliderCont extends Controller
{
    public function be_slider(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Slider::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('img', function($data){
                        $url=asset("img_slider/".$data->img_slider); 
                        return '<img src='.$url.' border="0" width="100px" class="img-rounded" align="center" />'; 
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn = ' <a href="#" type="button" data-p_id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','img'])
            ->make(true);
        }

        $linkbutton = Linkbutton::all();
        return view('be.slider',compact('linkbutton'));
    }

    public function be_slider_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'img_slider'       => 'required|mimes:jpeg,jpg,png,gif',           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $filename = time().'.'.$request->img_slider->getClientOriginalExtension();
            $request->img_slider->move(public_path('img_slider'), $filename);

            $data   = Slider::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'img_slider'     => $filename,
                    'judul'          => $request->judul,
                    'deskripsi'          => $request->deskripsi,
                ]
            );

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
                  'message' => 'Slider has been Added'
                ]
            );
        }
    }

    public function be_slider_dell(Request $request)
    {
        //FIND
        $cek_total_slider = Slider::all()->count();
        if ($cek_total_slider > 1) {
            # code...
            $data = Slider::where('id',$request->id)->delete();

            return response()->json(
                [
                'status'  => 200,
                'message' => 'Product has been Deleted'
                ]
            );
        }else {
            # code...
            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => 'hanya slider ini yang tersisa',
            ]);
        }
        
    }
}
