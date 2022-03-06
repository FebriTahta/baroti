<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Link;
use App\Models\Tag;
use App\Models\Kategori;
use App\Models\product_tag;
use Validator;
use Illuminate\Support\Str;
use Image;
use DataTables;
use File;
use Illuminate\Http\Request;

class ProductCont extends Controller
{
    public function product(){
        return view('fe.product');
    }

    public function index(Request $request)
    {
        $kategori   = Kategori::all();
        $tag        = Tag::all();
        $product    = Product::all();

        $prod      = Product::paginate(6);

    	if ($request->ajax()) {
    		$view = view('fe.data',compact('prod'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('fe.list',compact('kategori','tag','product','prod'));
    }

    public function be_product_post_page(Request $request)
    {
        return view('be.product_post');
    }

    public function be_product(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Product::orderBy('id','desc')->with(['kategori','tag']);
            return DataTables::of($data)
                    ->addColumn('img', function($data){
                        $url=asset("img_product/".$data->image); 
                        return '<img src='.$url.' border="0" width="100px" class="img-rounded" align="center" />'; 
                    })
                    ->addColumn('kategori', function($data){
                        return $data->kategori->name;
                    })
                    ->addColumn('tag', function($data){
                        $result[]='';
                        foreach ($data->tag as $key => $value) {
                            # code...
                            $result[] = $value->name;
                        }
                        return implode('</br>',$result);
                    })
                    ->addColumn('desc', function($data){
                        if (strlen($data->deskripsi) > 15) {
                            # code...
                            $desc = substr($data->deskripsi,0,15).' [...]';
                            return $desc;
                        }else {
                            # code...
                            $desc = $data->deskripsi;
                            return $desc;
                        }
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn = '<a href="/admin-product-edit-page/'.$data->slug.'" type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></a>';
                        $actionBtn .= ' <a href="#" type="button" data-p_id="'.$data->id.'" data-p_image="'.$data->image.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','img','desc','kategori','tag'])
            ->make(true);
        }
        $tag = Tag::all();
        $kategori = Kategori::all();
        return view('be.product',compact('tag','kategori'));
    }

    public function be_product_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'p_name'        => 'required',
            'p_deskripsi'   => 'required',
            'p_image'       => 'nullable|mimes:jpeg,jpg,png,gif',
            'p_harga'       => 'nullable',
            'kategori_id'   => 'nullable|max:50',
            'tag'           => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            if ($request->p_image !== null) {
                # code...
                $filename = time().'.'.$request->p_image->getClientOriginalExtension();
                $request->p_image->move(public_path('img_product'), $filename);

                $data   = Product::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'      => $request->p_name,
                        'slug'      => Str::slug($request->p_name),
                        'deskripsi' => $request->p_deskripsi,
                        'image'     => $filename,
                        'harga'     => $request->p_harga,
                        'kategori_id' => $request->kategori_id,
                        'link_tokped' => $request->link_tokped,
                        'link_shopee' => $request->link_shopee

                    ]
                );

                foreach ($request->tag as $key => $value) {
                    # code...
                    $data->tag()->syncWithoutDetaching($value);
                }
            }else {
                # code...
                $data   = Product::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'      => $request->p_name,
                        'slug'      => Str::slug($request->p_name),
                        'deskripsi' => $request->p_deskripsi,
                        'harga'     => $request->p_harga,
                        'kategori_id' => $request->kategori_id,
                        'link_tokped' => $request->link_tokped,
                        'link_shopee' => $request->link_shopee
                    ]
                );

                foreach ($request->tag as $key => $value) {
                    # code...
                    $data->tag()->syncWithoutDetaching($value);
                }
            }
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Product has been Added'
                ]
            );
        }
    }

    public function be_product_dell(Request $request)
    {
        //FIND
        $data = Product::where('id',$request->p_id)->first();
        $data->tag()->detach();
        unlink('img_product/'.$data->image);
        Product::where('id',$request->p_id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Product has been Deleted'
            ]
        );
    }

    public function be_product_edit($slug)
    {
        $data = Product::where('slug', $slug)->first();
        $link = Link::where('product_id', $data->id)->get();
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('be.product_edit',compact('data','link','kategori','tag'));
    }
}
