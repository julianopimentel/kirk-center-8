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
    <div class="blog-area full-width bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">

                    @foreach ($results as $result)
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="site/assets/img/800x600.png" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        @php
                                        $dateTime1 = new DateTime($result->created_at);
                                        echo $dateTime1->format('F, Y ', );
                                        @endphp
                                    </div>
                                    <h4>
                                        <a href="{{ route('blog.show', $result->id) }}">{{ mb_strimwidth($result->title, 0, 63, '...') }}</a>
                                    </h4>
                                    <p>
                                        @php
                                            echo mb_strimwidth($result->content, 0, 130, '...');
                                        @endphp
                                    </p>
                                    <a href="{{ route('blog.show', $result->id) }}">Leia mais<i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach

                    <div class="col-lg-12 col-md-12 pagi-area">
                        <nav aria-label="navigation">
                            {{ $results->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection

    @section('javascript')
    
    @endsection
    