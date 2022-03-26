@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="p-5 card">
                            <h4>{{ $note->title }}</h4>
                            @if (!empty($note->url_video))
                                <div class="row">
                                    <!-- NEW COLUMN WITH WIDTH TOTALLING 12 -->
                                    <iframe class="col-lg-12 col-md-12 col-sm-11" width="640" height="400"
                                        src="//www.youtube.com/embed/{{ $video->id }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                            <br>
                            <strong> Visualizações:</strong> {{ $video->statistics->viewCount }}
                            <br><br>
                            <div><strong>Descrição: </strong>
                                @php
                                    echo $note->content;
                                @endphp
                                <br><br>


                                <strong>Tags:</strong>

                                        @foreach ($video->snippet->tags as $group => $name)
                                        <div class="chip mt-2 mb-0 waves-effect">
                                            {{ $name }}
                                        </div>
                                    @endforeach

                  
                                <br>
                                <p>Autor: {{ $note->user->name }}
                                </p>

                                Publica em {{ datarecente($note->created_at) }}

                                <br> <br> <br>
                                <div class="form-group row">
                                    <a class="btn btn-primary" href="{{ route('sermons.index') }}" title="Voltar"><i
                                            class="c-icon c-icon-sm cil-action-undo"></i> Voltar</a> &nbsp;
                                    @if ($appPermissao->edit_sermons == true)
                                        <a class="btn btn-success" href="{{ route('sermons.edit', $note->id) }}"
                                            type="submit" title="Editar"><i class="c-icon c-icon-sm cil-pencil"></i></a>
                                    @endif
                                    @if ($appPermissao->delete_sermons == true)
                                        <form action="{{ route('sermons.destroy', $note->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-danger show_confirm" type="submit" title="Excluir"
                                                data-toggle="tooltip" title='Delete'><i
                                                    class="c-icon c-icon-sm cil-trash"></i></a>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="card-header">
                            <div class="card-body">
                                <form method="POST" action="{{ route('sermons.storecomentario', $note->id) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <textarea class="form-control" id='comment' name="comment" rows="2" placeholder="Mensagem.."></textarea>
                                    </div>
                                    <button class="btn btn-sm btn-success" type="submit">Comentar</button>
                            </div>
                            </form>
                            <div id="data-wrapper">
                                <!-- Results -->
                            </div>

                            <!-- Data Loader -->
                            <div class="auto-load text-center">
                                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60"
                                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <path fill="#000"
                                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                        <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                            dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var ENDPOINT = "{{ url('/') }}";
            var page = 1;
            infinteLoadMore(page);

            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    infinteLoadMore(page);
                }
            });

            function infinteLoadMore(page) {
                $.ajax({
                        url: ENDPOINT + "/sermons/comment/{{ $note->id }}?page=" + page,
                        datatype: "html",
                        type: "get",
                        beforeSend: function() {
                            $('.auto-load').show();
                        }
                    })
                    .done(function(response) {
                        if (response.length == 0) {
                            $('.auto-load').html("Não temos dados para exibir :)");
                            return;
                        }
                        $('.auto-load').hide();
                        $("#data-wrapper").append(response);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occured');
                    });
            }
        </script>
    @endsection
    @section('javascript')
    @endsection
@else
    @include('errors.redirecionar')
@endif
