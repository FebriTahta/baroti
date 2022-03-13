@extends('layouts.be.master')

@section('head')
<link rel="stylesheet" href="{{asset('assets/vendor/summernote/dist/summernote.min.css')}}"/>
@endsection

@section('content')
    <div class="page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="body">
                            @if ($keunggulan == null)
                            <form id="formadd" method="POST"> @csrf
                                <div class="form-group">
                                    <label>JUDUL</label>
                                    <input type="text" name="judul" id="judul" class="form-control text-capitalize" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>DESKRIPSI</label>
                                    <textarea class="summernote" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                </div>
                                                       
                                <div class="form-group">
                                    <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
                            @else
                            <form id="formadd" method="POST"> @csrf
                                <div class="form-group">
                                    <label>JUDUL</label>
                                    <input type="text" name="judul" id="judul" value="{{$keunggulan->judul}}" class="form-control text-capitalize" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>DESKRIPSI</label>
                                    <textarea class="summernote" name="deskripsi" id="deskripsi" cols="30" rows="10">{{$keunggulan->deskripsi}}</textarea>
                                </div>
                                                    
                                <div class="form-group">
                                    <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
                            @endif
                            
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
                            <h4 class="heading mt-4">Yakin Menghapus Team Ini?</h4>
                            <p>Team Tersebut akan dihapus dari daftar</p>
                        </div>
                        <input type="text" name="id" id="id">
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
                    <h5 class="modal-title" id="modal_title_6">UPDATE TEAM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formedit" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="heading mt-4">TEAM</h4>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <h4 class="heading mt-4">JABATAN</h4>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" required>
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
    <script src="{{asset('assets/vendor/summernote/dist/summernote.js')}}"></script>
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

        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var p_id = button.data('p_id')
            var modal = $(this)
            modal.find('.modal-body #p_id').val(p_id);
        })

        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var nama = button.data('nama')
            var jabatan = button.data('jabatan')
            var src = button.data('src')
            var img = button.data('img')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nama').val(nama);
            modal.find('.modal-body #jabatan').val(jabatan);
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
                url: "{{ route('be.team_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd2').attr('disabled', 'disabled');
                    $('#btnadd2').val('Process Adding Tag');
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
                url: "{{ route('be.keunggulan_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding keunggulan');
                },
                success: function(response) {
                    if (response.status == 200) {
                        // window.location.reload();
                        // $("#formadd")[0].reset();
                        // var oTable = $('#example').dataTable();
                        // oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        // $('#inputGroupFile01-preview').src = '../images/team-1.jpg';
                        // var preview = document.getElementById("inputGroupFile01-preview");
                        // preview.src =  '../images/team-1.jpg';
                        // $('#label_img').html('');
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
                url: "{{ route('be.tag_dell') }}",
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
                        $('#errList').append('<div> TIDAK DAPAT MENGHAPUS SATU SATUNYA TAG </div>');
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        // $(document).ready(function() {
        //     var table = $('#example').DataTable({
        //         destroy: true,
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('be.team') }}",
        //         columns: [
        //             {
        //                 "width":10,
        //                 data: 'nama',
        //                 name: 'nama'
        //             },
        //             {
        //                 "width":10,
        //                 data: 'jabatan',
        //                 name: 'jabatan'
        //             },
        //             {
        //                 "width":75,
        //                 data: 'image',
        //                 name: 'img'
        //             },
        //             {
        //                 "width": 5,
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: true,
        //                 searchable: true
        //             },
        //         ]
        //     });
        // });
    </script>
@endsection
