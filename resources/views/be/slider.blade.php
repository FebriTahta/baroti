@extends('layouts.be.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
@endsection
@section('content')
    <div class="page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="body">
                            <form id="formadd" method="POST"> @csrf
                                <div class="form-group">
                                    <label>IMAGE SLIDER</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img_slider"
                                            onchange="previewImage(event)" id="p_image">
                                        <label class="custom-file-label" for="p_image">Choose file</label>
                                    </div>
                                    <div class="img-preview" style="margin-top: 10px">
                                        <img src="{{asset('images/flexslider/shop1.jpg')}}" id="preview" width="100%" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">JUDUL</label>
                                    <input type="text" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">TEXT</label>
                                    <input type="text" name="deskripsi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">LINK BUTTON</label>
                                    <select class="form-control show-tick ms select2" name="linkbutton_id[]" multiple
                                        data-placeholder="Select" required>
                                        @foreach ($linkbutton as $item)
                                            <option value="{{ $item->id }}"
                                                >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Tabel Slider</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Img</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Img</th>
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
    <div class="modal modal-fluid fade" id="modal_1" tabindex="-1" role="dialog" aria-labelledby="modal_1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>NEW PRODUCT</h5>
                    <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                           
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
                            <h4 class="heading mt-4">Yakin Menghapus Slider Ini?</h4>
                            <p>Apabila hanya ini slider yang tersisa, slider tidak dapat dihapus</p>
                        </div>
                        <input type="hidden" name="id" id="p_id">
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
            var modal = $(this)
            modal.find('.modal-body #p_id').val(p_id);
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
                url: "{{ route('be.slider_post') }}",
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
                        // window.location.reload();
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('SUBMIT!');
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
                url: "{{ route('be.slider_dell') }}",
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
                        $('#modaldel').modal('hide');
                        $('#btndel').val('YES DELETE!');
                        $('#btndel').attr('disabled', false);
                        toastr.error(response.message);
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $('#errList').append('<div> TIDAK DAPAT MENGHAPUS SATU SATUNYA SLIDER </div>');
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
                ajax: "{{ route('be.slider') }}",
                columns: [
                    {
                        "width":95,
                        data: 'img',
                        name: 'img'
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
