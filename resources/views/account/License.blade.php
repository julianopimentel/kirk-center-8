@if (Auth::user()->isAdmin() == true)
@extends('layouts.baseminimal')

@section('content')

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <div class="container-fluid">
                  <div class="card">

              <div class="card-header">
                <h4>{{ __('account.information') }}</h4>
            </div>

             
                <div class="row">
                  <div class="form-group col-sm-4 col-md-6 col-lg-6 col-xl-6">
                    @if((Auth::user()->license - $countinst) >= 1 || Auth::user()->isAdmin())
                    <label for="ccmonth"><a href="{{ route('account.create') }}" class="btn btn-primary m-2">{{ __('account.add') }} {{ __('account.account') }}</a><br>
                      @endif
                  </div>
                  <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <label for="ccmonth">{{ __('account.license') }}</label><br>
                    <label for="ccmonth">{{ Auth::user()->license }}</label>
                  </div>
                  <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <label for="ccmonth">{{ __('account.used') }}</label><br>
                    <label for="ccmonth">{{ $countinst }}</label>
                  </div>
                  <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <label for="ccmonth">{{ __('account.available') }}</label><br>
                    <label for="ccmonth">{{ (Auth::user()->license - $countinst) }}</label>
                  </div>
                </div>
    <table class="table table-sm data-table">
        <thead>
            <tr>
                <th>Doc</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   

   
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('license_index') }}",
        columns: [
            {data: 'doc', name: 'doc'},
            {data: 'name_company', name: 'name_company'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'city', name: 'city'},
            {data: 'country', name: 'country'},
        ]
    });

  });
</script>
@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif