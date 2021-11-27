@extends('layouts.baseminimal')

@section('content')

<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> User {{ $user->name }}</div>
                      <div class="card-body">
                        <h4>Name: {{ $user->name }}</h4>
                        <h4>E-mail: {{ $user->email }}</h4>
                        <h4>Mobile: {{ $user->mobile }}</h4>
                        <h4>License: {{ $user->license }}</h4>
                        <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
               
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection