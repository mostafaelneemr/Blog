@extends('layouts.backend.master')

@section('title')
    Pages
@endsection

@section('content')

@include('admin.message')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Pages</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('pages.create')}}">Create</a></li>
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
                                    <th>#</th>
                                    <th>picture</th>
                                    <th>title</th>
                                    <th>created By</th>
                                    <th>published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach ($pages as $page)                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img style="width: 180px; height: 120px;" src="{{asset($page->thumbnail)}}"></td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->user->name }}</td>
                                    <td class="{{$page->is_published == 1 ? 'text-success':'text-danger'}}">{{ $page->is_published == 1 ? 'published':'draft'}}</td>
                                    <td>
                                        <a href="{{route('pages.edit', $page->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        
                                        <button class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                                        data-target="#Deleted{{$page->id}}"><i class="">Delete</i>
                                        </button>
                                    </td>
                                </tr>
                                @include('admin.pages.deleted')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
