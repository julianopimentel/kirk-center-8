@extends('layouts.errorBase')
@section('content')
<div class="container mt-5">
  <div class="page-error">
    <div class="page-inner">
      <h1>404</h1>
      <div class="page-description">
        The page you were looking for could not be found.
      </div>
      <div class="page-search">
        <form>
          <div class="form-group floating-addon floating-addon-not-append">
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
            </div>
          </div>
        </form>
        <div class="mt-3">
          <a href="{{ route('welcome') }}">Back to Home</a>
        </div>
      </div>
    </div>
  </div>
  <div class="simple-footer mt-5">
    Copyright &copy; DeskApps
  </div>
</div>

@endsection

@section('javascript')

@endsection