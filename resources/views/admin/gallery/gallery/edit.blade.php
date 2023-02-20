@extends('layouts.backend.master')

@section('title')
    Edit Gallery
@endsection

@section('css')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Edit Gallery</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">gallery</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('galleries.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf 

                        <input name="id" value="{{$gallery->id}}" type="hidden">
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{asset($gallery->image_url)}}" class="rounded-circle  h-25 w-25" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>picture</label>
                            <label id="projectinput7" class="file center-block">
                                <input type="file" id="file" name="image_url">
                                <span class="file-custom"></span>
                            </label>
                            @error('image_url')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();"> <i class="ft-x"></i> back</button>
                            <button type="submit" class="btn btn-primary"> <i class="la la-check-square-o"></i> update </button>
                        </div>
                    </form>
                </div>
            </div>
@endsection

@section('js')
@endsection