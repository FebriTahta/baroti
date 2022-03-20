@extends('layouts.be.master')

@section('content')
    <div class="page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-4" style="margin-bottom: 20px">
                    <a href="{{ route('be.product') }}" class="btn btn-sm btn-outline-primary"> <i
                            class="fa fa-arrow-left"></i> KEMBALI</a>
                </div>
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>UPDATE BLOG</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="formadd" method="POST">@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <label>JUDUL</label>
                                                <input type="text" value="{{ $data->judul }}" class="form-control" id="p_name"
                                                    name="judul" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Thumbnail Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img_thumbnail"
                                                    onchange="previewImage(event)" id="p_image">
                                                <label class="custom-file-label" for="p_image">Choose file</label>
                                            </div>
                                            <div class="img-preview" style="margin-top: 10px">
                                                <img src="{{ asset('img_blog/' . $data->img_thumbnail) }}" id="preview" width="283"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <?php $jenis = App\Models\Jenis::all();?>
                                                <select name="jenis_id" id="" class="form-control">
                                                    @foreach ($jenis as $item)
                                                        <option value="{{$item->id}}" 
                                                            @if ($item->id == $data->jenis_id)
                                                                selected
                                                            @endif
                                                            >{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label>Blog Desc</label>
                                        <textarea name="deskripsi" class="summernote" id="p_deskripsi" cols="30"
                                            rows="10">{!! $data->deskripsi !!}</textarea>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Link Tokped</label>
                                                <input type="text" class="form-control" name="link_tokped" value="{{$data->link_tokped}}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Link Shopee</label>
                                                <input type="text" class="form-control" name="link_shopee" value="{{$data->link_shopee}}">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <input type="submit" id="btnadd" class="btn btn-info form-control"
                                                    value="UPDATE!" style="color: white">
                                            </div>

                                            <div class="col-xl-6">
                                                <a href="{{ route('be.product') }}"
                                                    class="form-control btn btn-outline-secondary"> <i
                                                        class="fa fa-cancel"></i> CANCEL!</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.blog_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Product');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modal_1').modal('hide');
                        // window.location.reload();
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        toastr.success(response.message);
                        swal({
                            title: "Success!",
                            text: "UPDATE SUCCESS!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "/admin-blog";
                            }
                        });
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('Add Product');
                        $('#btnadd').attr('disabled', false);
                        toastr.error(response.message);
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errList').append('<div>' + err_values + '</div>');
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
