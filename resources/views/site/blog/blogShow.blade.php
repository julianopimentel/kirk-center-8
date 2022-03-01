@extends('site.layout.base')
@section('content')

     <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light" style="background-image: url(site/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Novidades</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    
     <!-- Start Blog 
    ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ $results->image }}" alt="Thumb">
                            </div>
                            <div class="info">
                                <br>
                                <h3>{{ $results->title }}</h3>
                                @php
                                    echo $results->content; 
                                @endphp 
                                <div class="post-tags">
                                    <span>Tags: </span>
                                    <a href="#">{{ $results->note_type }}</a>
                                </div>
                                <div class="post-pagi-area">
                                    <a href="{{ route('blog')}}"><i class="fas fa-arrow-left"></i>Retornar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->


    @endsection

    @section('javascript')
    
    @endsection
    