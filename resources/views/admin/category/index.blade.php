@extends('layouts.backend.master')

@section('title')
    Category
@endsection

@section('content')

@include('admin.message')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Category</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('categories.create')}}">create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- main body -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th>image</th>
                                <th>name</th>
                                <th>created By</th>
                                <th>published</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)                                
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img style="width: 180px; height: 120px;" src="{{asset($category->thumbnail)}}"></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td class="{{$category->is_published == 1 ? 'text-success':'text-danger'}}">{{ $category->is_published == 1 ? 'published' : 'draft'}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                                        data-target="#Deleted{{$category->id}}"><i class="">Delete</i>
                                    </button>
                                </td>
                                @include('admin.category.deleted')
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection