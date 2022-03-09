@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!--
            <div class="fade-in">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="hero text-white hero-bg-image">
                            <div class="hero-inner">
                                <h2>Welcome, {{ auth()->user()->name }}!</h2>
                                <p class="lead">This page is a place to view posts, their groups, and more.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    -->



        @if ($precadastro >= 1 and $appPermissao->edit_precadastro == true)
            <div class="card card-accent-success mb-12" style="max-width: 18rem;">
                <div class="card-body text-success">
                    <h6 class="card-title">Há cadastros a serem aprovados</h6>
                    <a href="{{ route('peopleList.index') }}" class="btn btn-primary">Pré-cadastro</a>
                    </p>
                </div>
            </div>
        @endif
        @if ($appPermissao->view_people == true and $peopleativo == 0)
            <div class="card card-accent-success mb-12" style="max-width: 25rem;">
                <div class="card-body text-success">
                    <h6 class="card-title">Gostaria de importar uma planilha com as Pessoas?</h6>
                    <a href="{{ url('settings/backup') }}" class="btn btn-primary">Importar</a>
                    </p>
                </div>
            </div>
        @endif
        <style type="text/css">
            .btn {
                margin-bottom: 4px;
            }

        </style>
        <div class="fade-in">
            @if ($appPermissao->home_social == true)
                @if (($social->facebook_link !== null) | ($social->twitter_link !== null) | ($social->linkedin_link !== null) | ($social->youtube_link !== null) | ($social->instagram_link !== null) | ($social->vk_link !== null) | ($social->site_link !== null) | ($social->telegram_link !== null) | ($social->whatsapp_link !== null))
                    <div class="row">
                        <div class="col-12">
                            <h6>Rede Sociais</h6>
                            <div class="card-body">
                                <p>
                                    @if ($social->facebook_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->facebook_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-facebook-f">
                                                </use>
                                            </svg><span>Facebook</span>
                                        </a>
                                    @endif
                                    @if ($social->twitter_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->twitter_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-twitter">
                                                </use>
                                            </svg><span>Twitter</span>
                                        </a>
                                    @endif
                                    @if ($social->linkedin_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->linkedin_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-linkedin">
                                                </use>
                                            </svg><span>LinkedIn</span>
                                        </a>
                                    @endif
                                    @if ($social->youtube_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->youtube_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-youtube">
                                                </use>
                                            </svg><span>YouTube</span>
                                        </a>
                                    @endif
                                    @if ($social->instagram_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->instagram_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-instagram">
                                                </use>
                                            </svg><span>Instagram</span>
                                        </a>
                                    @endif
                                    @if ($social->vk_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->vk_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-vk"></use>
                                            </svg><span>VK</span>
                                        </a>
                                    @endif
                                    @if ($social->site_link !== null)
                                        <a class="btn btn-sm" type="button" href="{{ $social->site_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                </use>
                                            </svg><span>Website</span>
                                        </a>
                                    @endif
                                    @if ($social->telegram_link !== null)
                                        <a class="btn btn-sm" type="button"
                                            href="https://t.me/{{ $social->telegram_link }}" target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-telegram">
                                                </use>
                                            </svg><span>Telegram</span>
                                        </a>
                                    @endif
                                    @if ($social->whatsapp_link !== null)
                                        <a class="btn btn-sm" type="button"
                                            href="https://api.whatsapp.com/send?phone={{ $social->whatsapp_link }}"
                                            target="_blank">
                                            <svg class="c-icon mr-2">
                                                <use xlink:href="/icons/sprites/brand.svg#cib-whatsapp">
                                                </use>
                                            </svg><span>Whatsapp</span>
                                        </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($appPermissao->home_message == true)
                @if (!$notes->isEmpty())
                    <h6>Mural de Recados</h6>
                    <div class="row">
                        @foreach ($notes as $note)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image">
                                            @if (!empty($note->image))
                                                <img src="{{ $note->image }}" width="100%" height="100%">
                                            @else
                                                <img src="assets/img/img0{{ $loop->iteration }}.jpg" width="100%"
                                                    height="100%">
                                            @endif
                                        </div>
                                        @if ($note->status_id == 2)
                                            <div class="article-badge">
                                                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i>
                                                    Trending</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a
                                                    href="recado/{{ $note->id }}">{{ mb_strimwidth($note->title, 0, 45, '...') }}</a>
                                            </h2>
                                        </div>
                                        <p> @php
                                            echo mb_strimwidth($note->content, 0, 120, '...');
                                        @endphp</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
            @if ($appPermissao->home_financeiro == true)
                <!-- /.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>Informações gerais</h6>
                                <p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="c-callout c-callout-info"><small class="text-muted">Total de
                                                        Visitas a Conta</small>
                                                    <div class="text-value-lg">{{ $totalvisitas }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-6">
                                                <div class="c-callout c-callout-danger"><small class="text-muted">Total
                                                        de Conversões</small>
                                                    <div class="text-value-lg"> {{ $totalconversao }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <!-- /.row-->
                                        <hr class="mt-0">
                                        Movimento finaceiro x Previsão
                                        <div class="progress-group">
                                            <div class="progress-group-header align-items-end">
                                                <svg class="c-icon progress-group-icon">
                                                    <use
                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                    </use>
                                                </svg>
                                                <div>Dizimos</div>
                                                <div class="ml-auto font-weight-bold mr-2"></div>
                                                <div class="text-muted small"></div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $porcentage_dizimo }}%" aria-valuenow="56"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-group">
                                            <div class="progress-group-header align-items-end">
                                                <svg class="c-icon progress-group-icon">
                                                    <use
                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                    </use>
                                                </svg>
                                                <div>Ofertas</div>
                                                <div class="ml-auto font-weight-bold mr-2"></div>
                                                <div class="text-muted small"></div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $porcentage_oferta }}%" aria-valuenow="15"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-group">
                                            <div class="progress-group-header align-items-end">
                                                <svg class="c-icon progress-group-icon">
                                                    <use
                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                    </use>
                                                </svg>
                                                <div>Doações</div>
                                                <div class="ml-auto font-weight-bold mr-2"></div>
                                                <div class="text-muted small"></div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $porcentage_doacao }}%" aria-valuenow="11"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-group">
                                            <div class="progress-group-header align-items-end">
                                                <svg class="c-icon progress-group-icon">
                                                    <use
                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                    </use>
                                                </svg>
                                                <div>Despesas</div>
                                                <div class="ml-auto font-weight-bold mr-2"></div>
                                                <div class="text-muted small"></div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width:  {{ $porcentage_despesa }}%" aria-valuenow="8"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="c-callout c-callout-warning"><small class="text-muted">Total
                                                        de Batismos</small>
                                                    <div class="text-value-lg">{{ $totalbatismo }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-6">
                                                <div class="c-callout c-callout-success"><small
                                                        class="text-muted">Total
                                                        de Pessoas</small>
                                                    <div class="text-value-lg">{{ $peopleativo }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <!-- /.row-->
                                        <hr class="mt-0">
                                        <div class="progress-group">
                                            Gráfico do movimento
                                            <div class="c-chart-wrapper">
                                                <canvas id="chats"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                    </div>

                                </div>
                                <!-- /.col-->
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if ($appPermissao->home_location == true and ($locations->lat and $locations->lng == !null))
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>Nossa localização</h6>
                                <p>
                                <div class="row">
                                    <div id="map"></div>
                                    <ul id="geoData">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function initMap() {
                        var myLatLng = {
                            lat: {{ $locations->lat }},
                            lng: {{ $locations->lng }}
                        };

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: myLatLng,
                            zoom: 17
                        });

                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'Local!',
                            draggable: false
                        });
                    }
                </script>
                <style type="text/css">
                    #map {
                        width: 100%;
                        height: 400px;
                    }

                </style>
                <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
            @endif

            <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>

            <script type="text/javascript">
                var pieChart = new Chart(document.getElementById('chats'), {
                    type: 'pie',
                    data: {
                        labels: ['Dizimo', 'Oferta', 'Doação', 'Despesa'],
                        datasets: [{
                            data: [{{ $dizimoatual }}, {{ $ofertaatual }}, {{ $doacaoatual }},
                                {{ $despesaatual }}
                            ],
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#2eb85c'],
                            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#2eb85c']
                        }]
                    },
                    options: {
                        responsive: true
                    }


                })
            </script>


        </div>
    @endsection

    @section('javascript')
    @endsection
