@if ($message = Session::get('success'))
<script>
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ __($message) }}"); 
</script>
@endif

@if ($message = Session::get('error'))
<script>
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ __($message) }}"); 
</script>
@endif

@if ($message = Session::get('warning'))
<script>
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ __($message) }}"); 
</script>
@endif

@if ($message = Session::get('info'))
<script>
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ __($message) }}"); 
</script>
@endif

@if ($errors->any())

@foreach ($errors->all() as $error)
<script>
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ $error }}"); 
</script>
@endforeach
@endif

