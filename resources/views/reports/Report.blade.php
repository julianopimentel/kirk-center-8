@if ($appPermissao->report_view and $appPermissao->view_group == true)
@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="fade-in">


            <h2 class="section-title">Relatórios</h2>
            <p class="section-lead">
              texto texto
            </p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Listagem
                        das
                        Pessoas</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary">
                        View All
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>Write something here</p>
                  </div>
                </div>



                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Listagem de
                        Grupos</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">
                          View All
                        </a>
                      </div>
                  </div>
                  <div class="card-body">
                    <p>Write something here</p>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Histórico
                        Financeiro</h4>
                    <div class="card-header-action">
                      <a href="{{ route('people.Financial') }}" class="btn btn-primary">View</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>Write something here</p>
                  </div>
                </div>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Localizações</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary">View All</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>Write something here</p>
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