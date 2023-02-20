@extends('layouts.backend.master')

@section('title')
    Create category
@endsection

@section('content')

@include('admin.message')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Create Category</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form class="form" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Picture</label>
                            <label id="projectinput7" class="file center-block">
                                <input type="file" id="file" name="thumbnail" required>
                                <span class="file-custom"></span>
                            </label>
                            @error('thumbnail')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
        
                        <div class="form-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                    
                                <div class="form-group col-md-6">
                                    <label>published</label>
                                    <select select name="is_published" class="select2 form-control">
                                         <optgroup label="choose publish ablut post">
                                             <option value=1>publish</option>
                                            <option value=0>draft</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();"><i class="ft-x"></i>back</button>
                            <button type="submit" class="btn btn-success"><i class="la la-check-square-o"></i>save</button>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection