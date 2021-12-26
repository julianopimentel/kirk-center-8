@if ($appPermissao->home_oracao == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                                        <h4>Pedidos de Oração</h4>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-4 col-xl-2">
                                        @if ($appPermissao->add_prayer == true)

                                            <div class="row">
                                                <a href="{{ route('prayer.create') }}"
                                                    class="btn btn-primary">{{ __('Adicionar') }}</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Texto</th>
                                        <th>Status</th>
                                        <th>Público?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prayers as $prayer)
                                        <tr>
                                            <td><strong>{{ $prayer->user->name }}</strong></td>
                                            <td><strong>{{ $prayer->title }}</strong></td>
                                            <td><strong>{{ $prayer->content }}</strong></td>
                                            <td>
                                                <span class="{{ $prayer->status->class }}">
                                                    {{ $prayer->status->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <label
                                                class="c-switch c-switch-label c-switch-pill c-switch-primary">
                                                <input class="c-switch-input" name="public"
                                                    type="checkbox" {{ $prayer->public == true ? 'checked' : '' }} disabled><span class="c-switch-slider"
                                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                            </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $prayers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection

@else
@include('errors.redirecionar')
@endif