@extends('layouts.be.master')

@section('content')
    <div class="page">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-10">
                    <div class="card">
                        <div class="body text-center">
                            <img style="max-width: 100%" src="{{asset('img_team/'.$team->img)}}" alt="">
                            <div class="form-group">
                                <h5 style="font-size: 26px">{{$team->nama}}</h5>
                            </div>
                            <div class="form-group">
                                <h6 style="font-size: 20px">{{$team->jabatan}}</h6>
                            </div>
                        </div>
                        <div class="body">
                            <form action="/add-exp-team" enctype="multipart/form-data" method="POST"> @csrf
                                <input type="hidden" name="id" value="{{$team->id}}">
                                <textarea name="deskripsi" class="form-control summernote" id="" cols="30" rows="10">{!!$team->deskripsi!!}</textarea>
                                <div class="form-group mt-3">
                                    <input type="submit" id="btnadd" class="btn btn-info" value="SUBMIT!"
                                        style="color: white">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1"></div>
            </div>
        </div>
    </div>


    
@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
                $('.summernote').summernote({
                    placeholder: 'Deskripsi...',
                    tabsize: 2,
                    height: 200
                });
            });
    </script>
@endsection
