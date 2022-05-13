@extends('layouts.be.master')

@section('content')
    <div class="page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <button type="button" class="btn btn-block btn-info" style="color: white" data-toggle="modal"
                            data-target="#modal_1">ADD NEW PRODUCT</button>
                        {{-- <a href="{{route('be.product_post_page')}}" class="form-control btn btn-primary">ADD NEW PRODUCT</a> --}}
                        <div class="header">
                            <h2>Tabel Product</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Img</th>
                                            <th>Name</th>
                                            {{-- <th>Price</th>
                                            <th>Kategori</th>
                                            <th>Tags</th> --}}
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Img</th>
                                            <th>Name</th>
                                            {{-- <th>Price</th>
                                            <th>Kategori</th>
                                            <th>Tags</th> --}}
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal_1" tabindex="-1" role="dialog" aria-labelledby="modal_5" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>NEW PRODUCT</h5>
                    <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    {{-- <a href="{{route('be.product_post_page')}}" class="form-control btn btn-primary">ADD NEW PRODUCT</a> --}}
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                            <form id="formadd" method="POST">@csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control text-capitalize" id="p_name"
                                                placeholder="Nama Product" name="p_name" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <label for="">Rp. </label>
                                                </div>
                                                <div class="col-sm-11">
                                                    <input type="number" class="form-control" id="p_harga" name="p_harga"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="kategori_id" class="form-control show-tick ms select2 text-capitalize" data-placeholder="Select">
                                                @foreach ($kategori as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tags</label>
                                            <select name="tag[]" class="form-control show-tick ms select2 text-capitalize" multiple
                                                data-placeholder="Select">
                                                @foreach ($tag as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-xl-6">
                                        <div class="form-group" id="dynamic_field">
                                            <label>Tokped Link</label>
                                            <input type="text" class="form-control" name="link_tokped"
                                                placeholder="https://link" style="margin-top: 10px">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group" id="dynamic_field">
                                            <label>Shoope Link</label>
                                            <input type="text" class="form-control" name="link_shopee"
                                                placeholder="https://link" style="margin-top: 10px">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Image 800 * 600 pixel</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="p_image"
                                                    onchange="previewImage(event)" id="p_image" required>
                                                <label class="custom-file-label" for="p_image">Choose file</label>
                                            </div>
                                            <div class="img-preview" style="margin-top: 10px">
                                                <img src="{{ asset('images/serv-13.jpg') }}" id="preview"
                                                    width="100%" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link Button Spesifik</label>
                                            <input type="text" class="form-control" name="button"
                                                placeholder="https://link" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link Button Lain</label>
                                            <?php $link = App\Models\Linkbutton::all();?>
                                            <select name="linkbutton_id[]" class="form-control show-tick ms select2 text-capitalize"
                                                multiple data-placeholder="Select">
                                                @foreach ($link as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Desc</label>
                                    <textarea name="p_deskripsi" class="summernote" id="p_deskripsi" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="modaldel" tabindex="-1" role="dialog" aria-labelledby="modal_5"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title_6">This is way to dangerous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formdel" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fa fa-exclamation-circle fa-4x"></i>
                            <h4 class="heading mt-4">Yakin Menghapus Product Ini?</h4>
                            <p>Semua atribut dan keterangan pada product ini akan dihapus dari daftar dan akan menghilang
                                dari
                                menu antar muka</p>
                        </div>
                        <input type="hidden" name="p_id" id="p_id">
                        <input type="hidden" name="p_image" id="p_image">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btndel" class="btn btn-sm btn-secondary" value="YES DELETE!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var p_id = button.data('p_id')
            var p_image = button.data('p_image')
            var modal = $(this)
            modal.find('.modal-body #p_id').val(p_id);
            modal.find('.modal-body #p_image').val(p_image);
        })

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
                url: "{{ route('be.product_post') }}",
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
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        $("#formadd")[0].reset();
                        $('#modal_1').modal('hide');
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

        $('#formdel').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.product_dell') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Process Deleting Product');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel').modal('hide');
                        $("#formdel")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel').val('SUBMIT!');
                        $('#btndel').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        $("#formdel")[0].reset();
                        $('#btndel').val('YES DELETE!');
                        $('#btndel').attr('disabled', false);
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

        $(document).ready(function() {
            var table = $('#example').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('be.product') }}",
                columns: [{
                        "width": 20,
                        data: 'img',
                        name: 'img'
                    },
                    {
                        "width": 35,
                        data: 'name',
                        name: 'name'
                    },
                    {
                        "width": 5,
                        data: 'opsi',
                        name: 'opsi',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
