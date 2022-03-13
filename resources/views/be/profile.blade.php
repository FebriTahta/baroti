@extends('layouts.be.master')

@section('content')
    <div class="page">

        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    @if ($data !== null)
                        <form id="formadd" method="POST">@csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail Image : 150 x 150 (px) (size kecil < 200kb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="thumbnail_home"
                                                            onchange="previewImage(event)" id="thumbnail_home" required>
                                                        <label class="custom-file-label" for="thumbnail_home">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('img_thumbnail/'.$data->thumbnail_home) }}" id="preview"
                                                            width="150" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image Header : 283 x 84 (size < 2mb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image_header"
                                                            onchange="previewImage2(event)" id="image_header">
                                                        <label class="custom-file-label" for="image_header">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('img_profile/'.$data->image_header) }}" id="preview2"
                                                            width="283" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                            style="color: white">
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <form id="formadd" method="POST">@csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail Image : 150 x 150 (px) (size kecil < 200kb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="thumbnail_home"
                                                            onchange="previewImage(event)" id="thumbnail_home" required>
                                                        <label class="custom-file-label" for="thumbnail_home">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('assets/images/user.png') }}" id="preview"
                                                            width="150" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image Header : 283 x 84 (size < 2mb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image_header"
                                                            onchange="previewImage2(event)" id="image_header">
                                                        <label class="custom-file-label" for="image_header">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('images/logo.png') }}" id="preview2"
                                                            width="283" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" id="btnadd" class="btn btn-info form-control" value="SUBMIT!"
                                            style="color: white">
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="card col-md-4">
                    <div class="body">
                        <div class="row">
                            <div class="col-md 12">
                                <form id="formuser" method="POST">@csrf
                                    <div class="body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ auth()->user()->id }}">
                                            <small class="text-muted">Username: </small>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <small class="text-muted">Password: </small>
                                            <input type="text" class="form-control" name="pass"
                                                value="{{ auth()->user()->pass }}">
                                        </div>
                                        <div class="form-group">
                                            <small class="text-muted">Email: </small>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" id="btnuser" class="btn btn-danger" value="UPDATE!">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-8">

                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card text-center profile-header" style="border-radius: 20px">
                        <div class="body">
                            <div class="profile-image">
                                @if ($data == null)
                                    <img src="../assets/images/user.png" class="rounded-circle" alt="">
                                @else
                                    <img src="{{ asset('img_thumbnail/' . $data->thumbnail_home) }}" width="200px" alt="">
                                @endif
                            </div>
                            <div style="margin-top: 35px">
                                @if ($data == null)
                                    <h4 class="m-b-0 text-capitalize"><strong>-</strong></h4>
                                    <span class="text-capitalize">{{ auth()->user()->name }}</span>
                                @else
                                    <h4 class="m-b-0 text-capitalize"><strong>{{ $data->nama_web }}</strong></h4>
                                    <span class="text-capitalize">{{ auth()->user()->name }}</span>
                                @endif
                            </div>
                            <div class="m-t-15">
                                @if ($data !== null)
                                    <button class="btn btn-primary" data-id="{{ $data->id }}"
                                        data-nama_web="{{ $data->nama_web }}" data-facebook="{{ $data->facebook }}"
                                        data-twitter="{{ $data->twitter }}" data-instagram="{{ $data->instagram }}"
                                        data-thumbnail_home="{{ asset('img_thumbnail/' . $data->thumbnail_home) }}"
                                        data-telp="{{ $data->telp }}" data-alamat="{{ $data->alamat }}"
                                        data-image_header="{{ asset('img_profile/' . $data->image_header) }}"
                                        data-toggle="modal" data-target="#modalprofile">UPDATE</button>
                                @else
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modaladdprofile">UPDATE</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="col-lg-8 col-md-12">
                    @if ($data == null)
                        <div class="card" style="border-radius: 20px">
                            <div class="body">
                                <small class="text-muted">Alamat: </small>
                                <p>-</p>
                                <small class="text-muted">Phone: </small>
                                <p>-</p>
                                <small class="text-muted">Nama Website: </small>
                                <p>-</p>
                                <small class="text-muted">Image Header: 266 x 84</small>
                                <div>
                                    <img style="width: 266px" src="images/logo.png" alt="">
                                </div>
                                <hr>

                            </div>
                        </div>
                    @else
                        <div class="card" style="border-radius: 20px">
                            <div class="body">
                                <small class="text-muted">Alamat: </small>
                                <p>{{ $data->alamat }}</p>
                                <small class="text-muted">Phone: </small>
                                <p>{{ $data->telp }}</p>
                                <small class="text-muted">Nama Website: </small>
                                <p>{{ $data->nama_web }}</p>
                                <small class="text-muted">Image Header: 266 x 84</small>
                                @if ($data->image_header == null)
                                    <div>
                                        <img style="width: 266px" src="images/logo.png" alt="">
                                    </div>
                                @else
                                    <div>
                                        <img style="width: 266px" src="{{ asset('img_profile/' . $data->image_header) }}"
                                            alt="">
                                    </div>
                                @endif

                                <hr>

                            </div>
                        </div>
                    @endif

                    <div class="card" style="border-radius: 20px">
                        @if ($data !== null)
                            <div class="body">
                                <small class="text-muted">Social: </small>
                                <p><i class="fa fa-twitter m-r-5"></i><br> {{ $data->twitter }}</p>
                                <p><i class="fa fa-facebook  m-r-5"></i><br> {{ $data->facebook }}</p>
                                <p><i class="fa fa-instagram m-r-5"></i><br> {{ $data->instagram }}</p>
                            </div>
                        @else
                            <div class="body">
                                <small class="text-muted">Social: </small>
                                <p><i class="fa fa-twitter m-r-5"></i><br> https://</p>
                                <p><i class="fa fa-facebook  m-r-5"></i><br> https://</p>
                                <p><i class="fa fa-instagram m-r-5"></i><br> https://</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- modal --}}
    {{-- <div class="modal modal-fluid fade" id="modaladdprofile" tabindex="-1" role="dialog" aria-labelledby="modal_1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>PROFILE</h5>
                    <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                            <form id="formadd" method="POST">@csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Website Name</label>
                                            <input type="text" class="form-control" id="nama_web" name="nama_web"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" id="telp" name="telp" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" id="alamat" cols="30"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail Image : 150 x 150 (px) (size kecil < 200kb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="thumbnail_home"
                                                            onchange="previewImage(event)" id="thumbnail_home" required>
                                                        <label class="custom-file-label" for="thumbnail_home">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('assets/images/user.png') }}" id="preview"
                                                            width="150" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image Header : 283 x 84 (size < 2mb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image_header"
                                                            onchange="previewImage2(event)" id="image_header">
                                                        <label class="custom-file-label" for="image_header">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('images/logo.png') }}" id="preview2"
                                                            width="283" alt="">
                                                    </div>
                                        </div>
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
            </div>
        </div>
    </div> --}}

    <div class="modal modal-fluid fade" id="modalprofile" tabindex="-1" role="dialog" aria-labelledby="modal_1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>PROFILE</h5>
                    <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                            <form id="formadd2" method="POST">@csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Website Name</label>
                                            <input type="hidden" id="id" name="id">
                                            <input type="text" class="form-control" id="nama_web" name="nama_web"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" id="telp" name="telp" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" id="alamat" cols="30"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail Image : 150 x 150 (px) (size kecil < 200kb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="thumbnail_home"
                                                            onchange="previewImage3(event)" id="thumbnail_home">
                                                        <label class="custom-file-label" for="thumbnail_home">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('assets/images/user.png') }}" id="preview3"
                                                            width="150" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image Header : 283 x 84 (size < 2mb)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image_header"
                                                            onchange="previewImage4(event)" id="image_header">
                                                        <label class="custom-file-label" for="image_header">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="img-preview" style="margin-top: 10px">
                                                        <img src="{{ asset('images/logo.png') }}" id="preview4"
                                                            width="283" alt="">
                                                    </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" id="btnadd2" class="btn btn-info form-control" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
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

        const previewImage2 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview2');
                preview.src = reader.result;
            };
        };

        const previewImage3 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview3');
                preview.src = reader.result;
            };
        };

        const previewImage4 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview4');
                preview.src = reader.result;
            };
        };

        $('#modalprofile').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var nama_web = button.data('nama_web')
            var facebook = button.data('facebook')
            var twitter = button.data('twitter')
            var instagram = button.data('instagram')
            var telp = button.data('telp')
            var alamat = button.data('alamat')
            var thumbnail_home = button.data('thumbnail_home')
            var image_header = button.data('image_header')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nama_web').val(nama_web);
            modal.find('.modal-body #facebook').val(facebook);
            modal.find('.modal-body #twitter').val(twitter);
            modal.find('.modal-body #instagram').val(instagram);
            modal.find('.modal-body #telp').val(telp);
            modal.find('.modal-body #alamat').val(alamat);
            const thumb = document.getElementById("preview3");
            thumb.src = thumbnail_home;
            const header = document.getElementById("preview4");
            header.src = image_header;
        })


        $('#formuser').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.user_update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnuser').attr('disabled', 'disabled');
                    $('#btnuser').val('Process Updating User');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#btnuser').val('UPDATE!');
                        $('#btnuser').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        $('#btnuser').val('UPDATE!');
                        $('#btnuser').attr('disabled', false);
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

        //addprofile
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.profile_post') }}",
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
                        $('#modaladdprofile').modal('hide');
                        window.location.reload();
                        $("#formadd")[0].reset();
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        // $("#formadd")[0].reset();
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

        //updateprofile
        $('#formadd2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('be.profile_post') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd2').attr('disabled', 'disabled');
                    $('#btnadd2').val('Process Adding Product');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalprofile').modal('hide');
                        window.location.reload();
                        $("#formadd2")[0].reset();
                        $('#btnadd2').val('SUBMIT!');
                        $('#btnadd2').attr('disabled', false);
                        toastr.success(response.message);
                    } else {
                        // $("#formadd")[0].reset();
                        $('#btnadd2').val('SUBMIT!');
                        $('#btnadd2').attr('disabled', false);
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
