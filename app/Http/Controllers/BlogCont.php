<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Slider;
use App\Models\Keunggulan;
use App\Models\Bahan;
use App\Models\Komen;
use App\Models\Ajakan;
use App\Models\Testi;
use App\Models\Jenis;
use App\Models\Profile;
use App\Models\Blog;
use DataTables;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;

class BlogCont extends Controller
{
    public function blog(Request $request)
    {
        $slider = Slider::with('linkbutton')->get();
        $about  = About::first();
        $keunggulan  = Keunggulan::first();
        $bahan = Bahan::all();
        $ajakan = Ajakan::first();
        $testi = Testi::all();
        $profile = Profile::first();
        $blog = Blog::with('jenis')->get();
        return view('fe.blog',compact('profile','about','blog'));
    }

    public function blog_detail($slug)
    {
        $profile = Profile::first();
        $blog = Blog::where('slug', $slug)->first();
        $relate_post = Blog::whereIn('jenis_id', [$blog->jenis_id])->inRandomOrder()->limit(2)->get();
        $list_blog = Blog::whereIn('jenis_id', [$blog->jenis_id])->inRandomOrder()->limit(3)->get();
        $kategori = Jenis::all();
        $ajakan = Ajakan::first();
        $komen = Komen::where('blog_id', $blog->id)->orderBy('id','desc')->get();
        return view('fe.blog_detail',compact('blog','profile','list_blog','kategori','relate_post','ajakan','komen'));
    }

    public function hapus_komen($id_komen)
    {
        Komen::find($id_komen)->delete();
        return redirect()->back()->with('info', 'Komentar Tersebut Telah Dihapus');  

    }

    public function submit_komen(Request $request)
    {
        $data   = Komen::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name'     => $request->name,
                'email'          => $request->email,
                'deskripsi'  => $request->deskripsi,
                'blog_id' => $request->blog_id,
            ]
        );

        return redirect()->back()->with('success', 'Komentar anda telah dimuat');  
    }

    public function be_blog(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Blog::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('img', function($data){
                        $url=asset("img_blog/".$data->img_thumbnail); 
                        return '<img src='.$url.' border="0" width="100px" class="img-rounded" align="center" />'; 
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn = ' <a href="/admin-blog-update/'.$data->slug.'" type="button" class="btn btn-sm btn-info text-white" style="margin-bottom:10px; margin-right:10px;"><i class="fa fa-pencil"></i> UPDATE</a>';
                        $actionBtn .= ' <a href="#" type="button" data-p_id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','img'])
            ->make(true);
        }

        return view('be.blog');
    }

    public function be_blog_update(Request $request, $slug)
    {
        $data = Blog::where('slug', $slug)->first();
        return view('be.blog_update',compact('data'));
    }

    public function be_blog_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'img_thumbnail'       => 'mimes:jpeg,jpg,png,gif',           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            if ($request->img_thumbnail !== null) {
                # code...
                $filename = time().'.'.$request->img_thumbnail->getClientOriginalExtension();
                $request->img_thumbnail->move(public_path('img_blog'), $filename);

                $data   = Blog::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'img_thumbnail'     => $filename,
                        'judul'          => $request->judul,
                        'slug'      => Str::slug($request->judul),
                        'jenis_id' => $request->jenis_id,
                        'deskripsi'          => $request->deskripsi,
                    ]
                );
            }else {
                # code...
                $data   = Blog::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'judul'          => $request->judul,
                        'slug'      => Str::slug($request->judul),
                        'jenis_id' => $request->jenis_id,
                        'deskripsi'          => $request->deskripsi,
                    ]
                );
            }
            
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Blog has been Added'
                ]
            );
        }
    }
}
