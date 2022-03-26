@extends('site.layout.base')
@section('content')
@section('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

    <!-- Start Breadcrumb
                ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url(site/site/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contato</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact
                ============================================= -->
    <div id="contact" class="contact-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-items">

                    <!-- End Thumb -->
                    <div class="col-md-4 thumb">
                        <img src="site/assets/img/illustrations/5.png" alt="Thumb">
                    </div>
                    <!-- End Thumb -->

                    <!-- Contact Form -->
                    <div class="col-md-7 col-md-offset-1 contact-form">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="" method="POST" action="{{ route('contact.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                                <!-- Error -->
                                @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                                @if ($errors->has('email'))
                                <div class="error">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                                @if ($errors->has('phone'))
                                <div class="error">
                                    {{ $errors->first('phone') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                                    id="subject">
                                @if ($errors->has('subject'))
                                <div class="error">
                                    {{ $errors->first('subject') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                                    rows="4"></textarea>
                                @if ($errors->has('message'))
                                <div class="error">
                                    {{ $errors->first('message') }}
                                </div>
                                @endif
                            </div>
                            <input type="submit" name="submit" value="Enviar" class="btn btn-dark btn-block"></i>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>

                <!-- Address List -->
                <div class="address-list text-center col-md-12">
                    <div class="item-box">
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-map-marked-alt"></i>
                                <h4>Location</h4>
                                <p>
                                    {{ localidade() }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-phone"></i>
                                <h4>Contato</h4>
                                <h2>{{ telefone() }}</h2>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-envelope-open"></i>
                                <h4>Email</h4>
                                <p>
                                    {{ contato() }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    </div>
                </div>
                <!-- End Address List -->

            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection

@section('javascript')
@endsection
