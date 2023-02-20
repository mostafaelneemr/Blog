@extends('layouts.backend.master')

@section('title')
    Dashboard
@endsection

@section('css')
@endsection

@section('content')
<div class="page-title">
    <div class="row">
      <div class="col-sm-6">
          <h4 class="mb-0">Dashboard</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- widgets -->
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-danger">
                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">category</p>
              <h4>{{\App\Models\category::count()}}</h4>
            </div>
          </div>
          {{-- <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower growth</p> --}}
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-warning"><i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i></span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">Posts</p>
              <h4>{{\App\Models\post::count()}}</h4>
            </div>
          </div>
          {{-- <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales</p> --}}
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-success"><i class="fa fa-dollar highlight-icon" aria-hidden="true"></i></span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">gallery</p>
              <h4>{{\App\Models\gallery::count()}}</h4>
            </div>
          </div>
          {{-- <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week </p> --}}
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-primary"><i class="fa fa-twitter highlight-icon" aria-hidden="true"></i></span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">Followers</p>
              <h4>62,500+</h4>
            </div>
          </div>
          {{-- <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated</p> --}}
        </div>
      </div>
    </div>
  </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">Latest Categories</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered p-0 text-center table-hover">
                                <thead>
                                    <tr>
                                        <td scope="col" width="60">#</td>
                                        <td scope="col" width="60">name</td>
                                        <td scope="col" width="200">created By</td>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach ($categories as $category)                                
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $category->name }}</th>
                                        <th>{{ $category->user->name }}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header">Latest Posts</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered p-0 text-center table-hover">
                                <thead>
                                    <tr>
                                        <td scope="col" width="60">#</td>
                                        <td scope="col" width="60">title</td>
                                        <td scope="col" width="200">created By</td>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach ($posts as $post)                                
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $post->title }}</th>
                                        <th>{{ $post->user->name }}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header">Latest Pages</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered p-0 text-center table-hover">
                                <thead style="font-style: bold">
                                    <tr>
                                        <td scope="col" width="60">#</td>
                                        <td scope="col" width="60">title</td>
                                        <td scope="col" width="200">created By</td>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach ($pages as $page)                                
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $page->title }}</th>
                                        <th>{{ $page->user->name }}</th>
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



