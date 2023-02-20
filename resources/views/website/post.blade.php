@extends('layouts.website.master')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{ asset($post->thumbnail) }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{$post->sub_title}}</h2>
                    <span class="meta">
                        Posted by
                        <a href="#">{{$post->user->name}}</a>
                        on {{date('M d, Y', strtotime($post->created_at))}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $post->details !!}
            </div>
        </div>
    </div>
</article>
<!-- Footer-->
@endsection