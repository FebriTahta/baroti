@extends('layouts.be.master')

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
                                    <label>NAMA</label>
                                    <input type="text" name="name" id="name" class="form-control text-capitalize" placeholder="Input Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>TESTIMONIAL</label>
                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p>- FOTO TEAM (300 * 300 PIXEL)</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input" id="inputGroupFile01"
                                                accept="image/*" onchange="showPreview(event);" required>
                                            <p class="custom-file-label" id="label_img" for="inputGroupFile01">Pilih Image</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="preview">
                                        <img style="max-width: 100%" id="inputGroupFile01-preview" src="{{asset('images/review-author-1.jpg')}}">
                                    </div>
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
                            <h2>Daftar Team</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            {{-- <th>Jabatan</th> --}}
                                            <th>Foto</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            {{-- <th>Jabatan</th> --}}
                                            <th>Foto</th>
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
                            <h4 class="heading mt-4">Yakin Menghapus Client Ini?</h4>
                            <p>Client Tersebut akan dihapus dari daftar</p>
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
                    <h5 class="modal-title" id="modal_title_6">UPDATE TESTIMONIAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formedit" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="heading mt-4">NAMA</h4>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <h4 class="heading mt-4">TESTIMONIAL</h4>
                            {{-- <input type="text" name="jabatan" id="jabatan" class="form-control" required> --}}
                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <h4 class="heading mt-4">PHOTO</h4>
                            <input type="file" name="img" onchange="showPreview2(event);" id="img" class="form-control">
                        </div>
                        <div class="py-3 text-center">
                            <div class="body">
                                <div class="preview">
                                    <img style="max-width: 100%" id="imgpreview">
                                </div>
                            </div>
                        </div>
                       
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btnadd2" class="btn btn-sm btn-primary" value="YES UPDATE!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
            var deskripsi = button.data('deskripsi')
            var src = button.data('src')
            var img = button.data('img')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #deskripsi').val(deskripsi);
            // modal.find('.modal-body #imgpreview').src = src;
            document.getElementById('imgpreview').src = src;
            console.log(src);
            // modal.find('.modal-body #img').val(img);
        })

        $('#formedit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.testi_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd2').attr('disabled', 'disabled');
                    $('#btnadd2').val('Process Adding Testimonial');
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
                url: "{{ route('be.testi_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Team');
                },
                success: function(response) {
                    if (response.status == 200) {
                        // window.location.reload();
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        // $('#inputGroupFile01-preview').src = '../images/team-1.jpg';
                        var preview = document.getElementById("inputGroupFile01-preview");
                        preview.src =  '../images/review-author-1.jpg';
                        $('#label_img').html('');
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
                url: "{{ route('be.testi_dell') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Process Deleting Team');
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
                ajax: "{{ route('be.testi') }}",
                columns: [
                    {
                        "width":10,
                        data: 'name',
                        name: 'name'
                    },
                    {
                        "width":75,
                        data: 'image',
                        name: 'img'
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
