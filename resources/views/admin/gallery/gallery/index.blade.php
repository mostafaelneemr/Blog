@extends('layouts.backend.master')

@section('title')
    Gallery
@endsection

@section('css')
@endsection

@section('content')

@include('admin.message')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Page Title</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Url</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>
                                    <td><img style="width: 150px; height: 100px;" src="{{asset($gallery->image_url)}}"></td>
                                    <td>{{ $gallery->user->name }}</td>
                                    <td>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['route' => ['galleries.destroy', $gallery->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection