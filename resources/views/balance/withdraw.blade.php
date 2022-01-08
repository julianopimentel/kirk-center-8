@if ($appPermissao->add_retirada_financial == true)
@extends('layouts.base')
@section('content')
<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Saída financeira</h4></div>
                    <div class="card-body">
                        <br>  
            <form action="{{ route('withdraw.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ccnumber">Pessoa</label>
                            <select class="itemName form-control" id="itemName" name="itemName" disabled></select>
                        </div>
                    </div>

                    <div class="form-group col-sm-2">
                    <label for="text">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        @foreach($statusfinan as $statusfinan)
                            <option value="{{ $statusfinan->id }}">{{ $statusfinan->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label for="ccyear">Data de lançamento</label>
                    <input class="form-control" id="date_lancamento" type="date" name="date_lancamento" placeholder="date" required><span class="help-block">Please enter a valid date</span>
                </div>
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="form-group col-sm-3">
                    <label for="ccmonth">Valor</label> em {{ $appSystem->currency }}
                    <input type="number" name="valor" class="form-control" placeholder="Valor do depósito" data-thousands="." data-decimal="," data-prefix="R$ " maxlength="18"  required>
                </div>

                <div class="form-group col-sm-3">
                    <label>Forma de Pagamento</label>
                    <select class="form-control" id="pag" name="pag">
                        @foreach($statuspag as $statuspags)
                        <option value="{{ $statuspags->id }}">{{ $statuspags->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="ccmonth">Observação</label>
                    <textarea class="form-control" name="observacao" rows="3" placeholder="Content.." maxlength="255" ></textarea>

                </div>
            </div>
            <button class="btn btn-danger" type="submit">Retirar</button>
            <a href="{{ url('financial') }}" class="btn btn-primary">Retornar</a>
        </div>
        
    </form>
    </div>
    <!-- /.row-->
</div>
</div>
</div>
</div>

<script type="text/javascript">
$('.itemName').select2({
placeholder: 'Select an item',

ajax: {
url: '/select2-autocomplete-people',
dataType: 'json',
delay: 250,
processResults: function (data) {
return {
results:  $.map(data, function (item) {
      return {
          text: item.name,
          id: item.id
      }
  })
};
},
cache: true
}
});
</script>

@endsection

@section('javascript')

@endsection

@else
@include('errors.redirecionar')
@endif