@extends('layouts.website.master')

@section('content')
    <!-- Page Header-->
    @foreach ($sliders as $slider)
    <header class="masthead" style="background-image: url({{asset($slider->image_url)}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$slider->title}}</h1>
                        <span class="subheading">{{$slider->sub_title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endforeach
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-7">
                
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
                        <a href=""3>
                            {{$post->user->name}}
                        </a>
                            
                        on {{date('M d,Y', strtotime($post->created_at)) }}
                        @if(count(array($post->categories)) > 0)
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
                <div class="d-flex justify-content-end mb-4">
                    {{$posts->links()}}
                </div>
           
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="category">
                    <h2 class="category-title">category</h2>
                    <ul class="category-list">
                        @foreach ($categories as $category)
                        <li><a href="{{url('category/' . $category->slug)}}"> {{$category->name}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
@endsection


