@if ($appPermissao->view_precadastro == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="nav-tabs-boxed">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dados" role="tab"
                                    aria-controls="dados"><i class="c-icon c-icon-sm cil-contact text-dark"></i> Dados
                                    Pessoais</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#endereco" role="tab"
                                    aria-controls="endereco"><i class="c-icon c-icon-sm cil-location-pin text-dark"></i>
                                    Endereço</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#membro" role="tab"
                                    aria-controls="membro"><i class="c-icon c-icon-sm cil-book text-dark"></i> Membresia</a>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('peopleList.update', $people->id) }}">
                            @csrf
                            @method('PUT')
                            {{ session(['aprovada-id' => $people->user_id]) }}
                            <div class="tab-content">
                                <div class="tab-pane active" id="dados" role="tabpanel">
                                    <div class="card-body">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="name">Nome *</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-face">
                                                                    </use>
                                                                </svg> </div>
                                                        <input class="form-control" id="name" name="name" type="text"
                                                            value="{{ $people->name }}" @if ($people->status_id != '21') disabled @endif requered>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ccnumber">Email @if ($campo->obg_email == true)
                                                        *
                                                    @endif</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-at">
                                                                    </use>
                                                                </svg> </div>
                                                        <input class="form-control" id="email" name="email" type="text"
                                                            placeholder="joao@live.com" value="{{ $people->email }}" @if ($people->status_id != '21') disabled @endif @if ($campo->obg_email == true)
                                                            required
                                                            @endif
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.row-->
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label for="ccnumber">Celular @if ($campo->obg_mobile == true)
                                                        *
                                                    @endif</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-mobile">
                                                                    </use>
                                                                </svg> </div>
                                                        <input class="form-control" id="mobile" name="mobile" type="tel"
                                                            pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}"
                                                            value="{{ $people->mobile }}" @if ($people->status_id != '21') disabled @endif @if ($campo->obg_mobile == true)
                                                            required
                                                            @endif
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label for="ccnumber">Data de Nascimento @if ($campo->obg_birth == true)
                                                        *
                                                    @endif</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                                    </use>
                                                                </svg> </div>
                                                        <input class="form-control" id="birth_at" name="birth_at"
                                                            type="date" placeholder="date"
                                                            value="{{ $people->birth_at }}" @if ($people->status_id != '21') disabled @endif @if ($campo->obg_birth == true)
                                                            required
                                                            @endif
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="col-md-4 col-form-label">Sexo @if ($campo->obg_sex == true)
                                                    *
                                                @endif</label>
                                                <div class="col-md-12 col-form-label">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="sex" type="radio" value="m"
                                                            name="sex" {{ $people->sex == 'm' ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif @if ($campo->sex == true)
                                                            required
                                                            @endif
                                                            >
                                                        <svg class="c-icon">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user">
                                                            </use>
                                                        </svg> <label class="form-check-label" for="m">Masculino</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="sex" type="radio" value="f"
                                                            name="sex" {{ $people->sex == 'f' ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif @if ($campo->sex == true)
                                                            required
                                                            @endif
                                                            >
                                                        <svg class="c-icon">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-female">
                                                            </use>
                                                        </svg>
                                                        <label class="form-check-label" for="f">Feminino</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="endereco" role="tabpanel">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <svg class="c-icon">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-address-book">
                                                            </use>
                                                        </svg> </div>
                                                <input class="form-control" id="address" name="address" type="text"
                                                    placeholder="Enter street name" value="{{ $people->address }}" @if ($people->status_id != '21') disabled @endif>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-5">
                                                <label for="city">City @if ($campo->obg_city == true)
                                                    *
                                                @endif</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-house">
                                                                </use>
                                                            </svg> </div>
                                                    <input class="form-control" id="city" name="city" type="text"
                                                        placeholder="Enter your city" value="{{ $people->city }}" @if ($people->status_id != '21') disabled @endif  @if ($campo->obg_city == true)
                                                        required
                                                        @endif
                                                        >
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="country">State @if ($campo->obg_state == true)
                                                    *
                                                @endif</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-home">
                                                                </use>
                                                            </svg> </div>
                                                    <input class="form-control" id="state" name="state" type="text"
                                                        placeholder="State" placeholder="SP" value="{{ $people->state }}" @if ($people->status_id != '21') disabled @endif  @if ($campo->obg_state == true)
                                                        required
                                                        @endif
                                                        >
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="postal-code">Postal Code</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text" @if ($people->status_id != '21') disabled @endif>
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-newspaper">
                                                                </use>
                                                            </svg> </div>
                                                    <input class="form-control" id="cep" name="cep" type="text"
                                                        placeholder="Postal Code" value="{{ $people->cep }}"
                                                        pattern="[0-9]{5}-[0-9]{3}" maxlength="9" @if ($people->status_id != '21') disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <svg class="c-icon">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                            </use>
                                                        </svg> </div>
                                                <input class="form-control" id="country" type="text" name="country"
                                                    placeholder="Country name" value="{{ $people->country }}" @if ($people->status_id != '21') disabled @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="membro" role="tabpanel">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Status</label>
                                            <div class="col-md-9 col-form-label">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="is_responsible"
                                                        name="is_responsible" type="checkbox"
                                                        {{ $people->is_responsible == true ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif>
                                                    <label class="form-check-label" for="check1">Responsável</label >
                                                </div>
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="is_visitor" type="checkbox"
                                                        name="is_visitor"
                                                        {{ $people->is_visitor == true ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif>
                                                    <label class="form-check-label" for="check2">Visitante</label>
                                                </div>
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="is_baptism" type="checkbox"
                                                        name="is_baptism"
                                                        {{ $people->is_baptism == true ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif>
                                                    <label class="form-check-label" for="check4">Batismo</label>
                                                </div>
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="is_transferred" type="checkbox"
                                                        name="is_transferred"
                                                        {{ $people->is_transferred == true ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif>
                                                    <label class="form-check-label" for="check5">Transferido</label>
                                                </div>
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="is_conversion" type="checkbox"
                                                        name="is_conversion"
                                                        {{ $people->is_conversion == true ? 'checked' : '' }} @if ($people->status_id != '21') disabled @endif>
                                                    <label class="form-check-label" for="check6">Convertido</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="textarea-input">Anotações  @if ($campo->obg_note == true)
                                                *
                                            @endif</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="note" name="note" rows="9"
                                                    placeholder="Content.." @if ($people->status_id != '21') disabled @endif @if ($campo->obg_note == true)
                                                    required
                                                    @endif
                                                    >{{ $people->note }}</textarea >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                           </div>
                           <div class="row">

                                @if ($people->status_id == '21' and $appPermissao->edit_precadastro == true)
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Aprovar</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <form action="{{ route('peopleList.reprovar', $people->id ) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Reprovar</button>
                                              </form>
                                        </div>
                                    </div>                            
                               
                                @endif
                                <div class="col-sm-2">
                                <a class="btn btn-primary" href="{{ route('peopleList.index') }}">Retornar</a>
                                </div>
                            </div>
                    </div>
                    <!-- /.col-->
                </div>

            </div>
            <!-- /.row-->
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
    </div>
    <script>
        $("#name").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });
        $("#state").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });
    </script>
@endsection

@section('javascript')

@endsection

@else
@include('errors.redirecionar')
@endif
