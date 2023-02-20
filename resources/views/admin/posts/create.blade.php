@extends('layouts.backend.master')

@section('title')
    Create Post
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    @include('admin.message')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Create Post</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('posts.index')}}">Posts</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- main body -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form class="form" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> thumbnail</label>
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
                                <label>title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>sub title</label>
                                <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" required>
                                @error('sub_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>details</label>
                                <textarea name="details" class="form-control" id="details" rows="5"></textarea>
                                @error('details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>categories</label>
                            <select name="category_id[]" id="category_id" class="selectpicker"  data-style="btn btn-success btn-round" data-live-search="true" data-size="5" multiple>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                             </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>published</label>
                            <select name="is_published" class="select2 form-control">
                                <optgroup label="choose publish ablut post">
                                    <option value=1>publish</option>
                                    <option value=0>draft</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1" onclick="history.back();"><i class="ft-x"></i>back</button>
                        <button type="submit" class="btn btn-success"><i class="la la-check-square-o"></i>save</button>
                    </div>

                </form>
            </div>
            {{-- <div class="card-body">
                    {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('thumbnail') !!}
                        {!! Form::text('thumbnail', null, ['class' => 'form-control', 'placeholder' => 'thumbnail']) !!}
                        @if($errors->has('thumbnail')) 
                            <span class="help=block">{!! $errors->first('thumbnail') !!} </span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        {!! Form::label('Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        @if($errors->has('title')) 
                            <span class="help=block">{!! $errors->first('title') !!} </span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('sub_title')) has-error @endif">
                        {!! Form::label('Sub_Title') !!}
                        {!! Form::text('sub_title', null, ['class' => 'form-control', 'placeholder' => 'Sub-Title']) !!}
                        @if($errors->has('sub_title')) 
                            <span class="help=block">{!! $errors->first('sub_title') !!} </span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('details')) has-error @endif">
                        {!! Form::label('Details') !!}
                        {!! Form::textarea('details', null, ['class' => 'form-control', 'placeholder' => 'Details']) !!}
                        @if($errors->has('details')) 
                            <span class="help=block">{!! $errors->first('details') !!} </span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('category_id')) has-error @endif">
                        {!! Form::label('category_id') !!}
                        {!! Form::select('category_id[]', $categories, null, ['class' => 'form-control', 'id' => 'category_id', 'multiple' => 'multiple']) !!}
                        @if($errors->has('category_id')) 
                            <span class="help=block">{!! $errors->first('category_id') !!} </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('publish') !!}
                        {!! Form::select('is_published', [1 => 'published', 0 => 'Draft'], null, ['class' => 'form-control'] ) !!}
                        
                    </div>
                        {!! Form::submit('create', ['class' => 'btn btn-sm btn-success']) !!}
                        {!! Form::close() !!}

            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('js')

    {{-- j-query script to select 2  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- ck editor for details --}}
        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('details');

            $('#category_id').select2({
                placeholder: "Select categories"
            });
        }); 
    </script>
@endsection
