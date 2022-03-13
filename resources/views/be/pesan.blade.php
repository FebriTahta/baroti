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
                {{-- <div class="col-xl-4">
                    <div class="card">
                        <div class="header" style="background-color: rgb(125, 51, 243);">
                            <h2 style="color: white;">BUTTON</h2>
                        </div>
                        <div class="body">
                            <form id="formadd" method="POST"> @csrf
                                <div class="form-group">
                                    <label>NAMA (Whatsapp / Tokopedia / Dsb)</label>
                                    <input type="text" name="name" id="name" class="form-control text-capitalize"
                                        placeholder="Nama Button" required>
                                </div>
                                <div class="form-group">
                                    <label>LINK BUTTON (https://)</label>
                                    <input type="text" name="link" id="name" class="form-control text-capitalize"
                                        placeholder="Input Link Button Diawali https://" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">

                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
                {{--  --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Team</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telp</th>
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
                            <h4 class="heading mt-4">Yakin Menghapus Pesan ini?</h4>
                            {{-- <p>Button akan dihapus dari daftar dan tiap elemen yang membawa button tersebut akan kehilangan
                                button tersebut</p> --}}
                        </div>
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btndel" class="btn btn-sm btn-secondary" value="YES DELETE!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modal_5" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title_6">DETAIL PESAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formedit" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <h4 class="heading mt-4">PESAN</h4>
                            <textarea name="pesantext" class="form-control" id="pesantext" cols="30" rows="10"></textarea>
                            {{-- <input type="text" name="name" id="name" class="form-control" required> --}}
                        </div>
                        {{-- <div class="form-group">
                            <h4 class="heading mt-4">LINK</h4>
                            <input type="text" name="link" id="link" class="form-control" required>
                        </div> --}}

                        <input type="hidden" name="id" id="id">
                    </div>
                    {{-- <div class="modal-footer">
                        <input type="submit" id="btnadd2" class="btn btn-primary" value="YES UPDATE!">
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <!-- Select2 Js -->
    <script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <!-- Input Mask Plugin Js -->
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <!-- tagsinput -->
    <script src="{{ asset('assets/vendor/nouislider/js/nouislider.min.js') }}"></script>
    <!-- SLIDERS -->

    {{-- <script src="{{ asset('assets/js/pages/advanced-form.js') }}"></script> --}}
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("inputGroupFile01-preview");

                preview.src = src;
                preview.style.display = "block";
                console.log(src);
                $('#label_img').html(src.substr(0, 25));
            }
        }

        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("imgpreview");

                preview.src = src;
                preview.style.display = "block";
            }
        }

        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var p_id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(p_id);
        })

        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var pesantext = button.data('pesantext')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            // modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #pesantext').val(pesantext);
            console.log(pesantext);
        })

        $('#formedit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.link_button_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd2').attr('disabled', 'disabled');
                    $('#btnadd2').val('Process Adding Link Button');
                },
                success: function(response) {
                    if (response.status == 200) {
                        // window.location.reload();
                        $("#formedit")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd2').val('SUBMIT!');
                        $('#btnadd2').attr('disabled', false);
                        $('#modaledit').modal('hide');
                        toastr.success(response.message);
                    } else {
                        $("#formedit")[0].reset();
                        $('#btnadd2').val('UPDATE!');
                        $('#btnadd2').attr('disabled', false);
                        $('#modaledit').modal('hide');
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

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.link_button_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Linkbutton');
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

        $('#formadd2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.ajakan_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#addajakan').attr('disabled', 'disabled');
                    $('#addajakan').val('Process Adding Linkbutton');
                },
                success: function(response) {
                    if (response.status == 200) {
                        window.location.reload();
                        $('#addajakan').val('SUBMIT AJAKAN');
                        $('#addajakan').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        $('#addajakan').val('SUBMIT!');
                        $('#addajakan').attr('disabled', false);
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
                url: "{{ route('be.pesan_dell') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Process Deleting Link Button');
                },
                success: function(response) {
                    if (response.status == 200) {
                        window.location.reload();
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
                        $('#errList').append('<div> TIDAK DAPAT MENGHAPUS SATU SATUNYA TAG </div>');
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
                ajax: "{{ route('be.pesan') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        "width": 5,
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
