@extends('layouts.website.master')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{asset($category->thumbnail)}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{$category->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-8 col-lg-8 mx-auto">
            <!-- Post preview-->
            @foreach ($posts as $post)
            <div class="post-preview">
                <a href="{{url('post/' . $post->slug)}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2> 
                    <h3 class="post-subtitle">
                        {{$post->sub_title}}
                    </h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#">
                        {{$post->user->name}}
                    </a>
                        
                    on {{date('M d,Y', strtotime($post->created_at)) }}
                    @if(count($post->categories) > 0)
                        | <span class="post-category">
                            category : 
                            @foreach ($post->categories as $category)
                            <a href="{{url('category/' . $category->slug)}}"> {{$category->name}} </a>,
                            @endforeach 
                        </span> 
                    @endif
                </p>
            </div>
                 <hr class="my-4" />
            @endforeach
            
            <!-- Pager-->
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
       
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ url('post/' . $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->sub_title }}
                        </h3>
                    </a>

                    <p class="post-meta">Posted by
                        <a href="#">{{ $post->user->name }}</a>

                        on {{ date('M d, Y', strtotime($post->created_at)) }}
                        @if(count($post->categories) > 0)
                            | <span class="post-category">
                        Category :
                                @foreach($post->categories as $category)
                                    <a href="{{ url('category/' . $category->slug) }}">{{ $category->name }}</a>,
                                @endforeach
                    </span>
                        @endif
                    </p>
                </div>
                <hr>
        @endforeach

        <!-- Pager -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
        </div>
    </div>
</div> --}}
<!-- Footer-->
@endsection