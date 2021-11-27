@if ($appPermissao->report_view and $appPermissao->view_people == true)
@extends('layouts.base')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


  <style type="text/css">
    #mymap {
         width: 100%;
          height: 600px;
    }
  </style>
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h5>Listagem de Localização para planejamento</h5>
                                    </div>
                         
                                    <div class="row">
                                      <div id="mymap"></div>
                                  </div>
                                    

                                    <script type="text/javascript">
                                  
                                  
                                      var locations = <?php print_r(json_encode($peoples)) ?>;
                                  
                                  
                                      var mymap = new GMaps({
                                        el: '#mymap',
                                        lat: -14.3005684,
                                        lng: -58.9375103,
                                        zoom: 3,
                                      });
                                  
                                  
                                      $.each( locations, function( index, value ){
                                          mymap.addMarker({
                                            lat: value.lat,
                                            lng: value.lng,
                                            title: value.name,
                                          });
                                     });
                                  
                                  
                                    </script>
@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif