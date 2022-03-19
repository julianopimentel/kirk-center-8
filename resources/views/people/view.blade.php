<!-- Modal Update Transaction-->
<div class="modal fade" id="ViewPeople{{ $people->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ViewPeople{{ $people->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewPeople{{ $people->id }}Title">
                    @if ($people->sex == 'm')
                        <svg class="c-icon">
                            <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user">
                            </use>
                        </svg>
                    @else
                        <svg class="c-icon">
                            <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-female">
                            </use>
                        </svg>
                    @endif
                    {{ $people->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="invoice">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            Email: {{ $people->email }}<br>
                            Mobile: {{ $people->mobile }}<br>
                            Birth: {{ $people->birth_at }}<br>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Endereço:</strong><br>
                                    {{ $people->address }} CEP: {{ $people->cep }}<br>
                                    @if ($people->city != null)
                                        @foreach ($city as $data)
                                            @if ($data->id == $people->city)
                                                {{ $data->name }}
                                            @endif
                                        @endforeach
                                    @elseif($people->city != null)
                                        {{ $people->city }}
                                    @elseif($people->state != null)
                                        {{ $people->state }}
                                    @elseif($people->country != null)
                                        {{ $people->country }}
                                    @endif
                                </address>
                            </div>
                            <div class="col-md-6">
                                <address>
                                    <strong>Permissão:</strong> {{ $people->roleslocal->name }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <address>
                                    <div class="form-group row">
                                        <div class="col-md">
                                            <strong>Membresia:</strong>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_responsible == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check1">Responsável</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_visitor == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check2">Visitante</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_baptism == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check4">Batismo</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_transferred == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check5">Transferido</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_conversion == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check6">Convertido</label>
                                        </div>
                                    </div>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <address>
                            <strong>Grupos associados:</strong><br>
                        </address>
                    </div>
                    <div class="col-md-12">
                        <address>
                            <strong>Moram comigo:</strong><br>
                        </address>
                    </div>
                    <div class="col-md-12">
                        <address>
                            <strong>Note:</strong><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
