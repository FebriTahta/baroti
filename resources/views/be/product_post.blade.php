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
                            <h2>ADD PRODUCT</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="formadd" method="POST">@csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="">
                                        <label>Product Name</label>
                                        <input type="text" value="" class="form-control" id="p_name"
                                            name="p_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <div class="row">
                                            <div class="col-xl-1">
                                                <label>Rp. </label>
                                            </div>
                                            <div class="col-xl-11">
                                                <input type="number" value="" class="form-control"
                                                    id="p_harga" name="p_harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <p>Multiple Select</p>
                                            <select class="form-control show-tick ms select2" multiple data-placeholder="Select">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="p_image"
                                                onchange="previewImage(event)" id="p_image">
                                            <label class="custom-file-label" for="p_image">Choose file</label>
                                        </div>
                                        <div class="img-preview" style="margin-top: 10px">
                                            <img src="{{ asset('images/shop/items/1.jpg') }}" id="preview" width="283"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Desc</label>
                                        <textarea name="p_deskripsi" class="summernote" id="p_deskripsi" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Link Tokped</label>
                                                <input type="text" class="form-control" name="link_tokped" value="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Link Shopee</label>
                                                <input type="text" class="form-control" name="link_shopee" value="">
                                            </div>
                                        </div>
                                    </div>
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
        var total_link = $("#total_link").val();
        var i = total_link;
        $('#add').click(function() {
            var title = $("#title").val();
            i++;
            $('#dynamic_field').append('<div>' + i + '<a id="ya' + i + '"><tr id="row' + i +
                '" class="dynamic-added"><hr><button type="button" name="remove" id="' + i +
                '" class="btn btn-outline-danger btn-sm btn_remove">remove</button> <td><label>Link Marketplace</label><input type="text" name="name_m[]" class="form-control" placeholder="Tokopedia / Shopee / dsb "style="margin-top: 10px"><input type="text" class="form-control" placeholder="https://link"style="margin-top: 10px" name="link_m[' +
                i + ']"></td><td></td></tr></a></div>');
            $("#total_link").val(i);
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#ya' + button_id + '').remove();
            
        });

        $(document).on('click', '.btn_hapus', function() {
            
            var button_id = $(this).attr("id");
            $('#oke' + button_id + '').remove();
            
        });

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
                                window.location.href = "/admin-product";
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
