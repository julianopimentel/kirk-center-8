@if ($appPermissao->view_precadastro == true)
@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="container">

                      <div class="card-header"><h5>Pré-cadastro</h5></div>
                            <form action="{{ route('peopleList.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}
                         <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                                    <div class="inner">
                                        <input type="text" id='name' name="name" class="form-control" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="inner">
                                      <select class="form-control" id="status" name="status">
                                          <option value="">Status</option>
                                          @foreach($status as $status)
                                          <option value="{{ $status->id }}">{{ $status->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                    <div class="box-header">
                                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </form>
                        
                        <div class="box-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>E-mail</th>
                                      <th>Mobile</th>
                                      <th>Localization</th>
                                      <th>Status</th>
                                      <th>Created At</th>
                                      <th>{{ __('account.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($peoples as $people)
                                    <tr>
                                      <td><strong>{{ $people->name }}</strong> 
                                        @if($people->is_verify == false)
                                        <span class="badge badge-danger">NEW</span>
                                        @endif</td>
                                      <td>{{ $people->email }}</td>
                                      <td>{{ $people->phone }}</td>
                                      <td>
                                        @if($people->city && $people->state != null)
                                        {{ $people->city }} / {{ $people->state }}
                                        @elseif($people->city != null)
                                        {{ $people->city }}
                                        @elseif($people->state != null)
                                        {{ $people->state }}
                                        @elseif($people->country != null)
                                        {{ $people->country }}
                                        @endif
                                      </td>
                                      <td>
                                        <span class="{{ $people->status->class }}">
                                          {{ $people->status->name }}
                                        </span>
                                      </td>
                                      <td>{{ $people->created_at }}</td>
                                      <td width="1%">
                                      @if ($appPermissao->edit_precadastro == true)
                                       <a href="{{ route('peopleList.edit', $people->id) }}"><i class="c-icon c-icon-sm cil-arrow-thick-right text-dark"></i></a>
                                      @endif
                                    </td>
                                    </tr>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>

                            @if (isset($dataForm))
                            {!! $peoples->appends($dataForm)->links() !!}
                            @else
                            {!! $peoples->links() !!}
                            
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
        </div>
    </div>
</div>
<script>
  $("#name").on("input", function(){
    $(this).val($(this).val().toUpperCase());
});
</script>
@endsection

@section('javascript')

@endsection

@else
@include('errors.redirecionar')
@endif
