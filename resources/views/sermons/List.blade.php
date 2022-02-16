@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                @if ($appPermissao->add_sermons == true)
                    <div class="card">
                        <div class="card-header">
                            <div class="form-groups row">
                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                    <h4>Palavras</h4>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <a href="{{ route('sermons.create') }}" class="add_button btn btn-sm btn-primary"
                                        title="Adicionar"><i class="c-icon c-icon-sm cil-plus"></i></a>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <a href="{{ route('sermons.showCategory') }}"
                                        class="add_button btn btn-sm btn-primary" title="Adicionar categoria"><i
                                            class="c-icon c-icon-sm cil-settings"></i></a>
                                </div>
                            </div>
                        </div>
                        @if ($category->count() <= 1 and $appPermissao->add_sermons == true)
                            Você ainda não cadastrou nenhuma categoria. Após cadastrar adicionar novos videos e vincular a
                            essas categorias.
                        @endif
                    </div>
                @endif

                @foreach ($category as $category)
                    @if (!$notes->isEmpty())
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ $category->name }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('sermons.indexCategory', $category->id) }}" class="btn btn-primary">
                                        Ver todos
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    @foreach ($notes as $note)
                                        @if ($note->type === $category->id)
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                                <article class="article article-style-b">
                                                    <div class="article-header">
                                                        <div class="article-image">
                                                            @if (!empty($note->image))
                                                                <img src="{{ $note->image }}" width="100%" height="100%">
                                                            @else
                                                                <img src="assets/img/img0{{ $loop->iteration }}.jpg"
                                                                    width="100%" height="100%">
                                                            @endif
                                                        </div>
                                                        @if ($note->status_id == 2)
                                                            <div class="article-badge">
                                                                <div class="article-badge-item bg-danger"><i
                                                                        class="fas fa-fire"></i>
                                                                    Trending</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="article-details">
                                                        <div class="article-title">
                                                            <h2><a
                                                                    href="{{ route('sermons.show', $note->id) }}">{{ mb_strimwidth($note->title, 0, 45, '...') }}</a>
                                                            </h2>
                                                        </div>
                                                        <p>{{ mb_strimwidth($note->content, 0, 130, '...') }}</p>
                                                    </div>
                                                </article>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <br>
                    @endif
            </div>
    @endforeach

    @if ($category->count() == 0)
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><strong>Palavras</strong></h4>
            </div>
            <div class="container-fluid">
                <div class="fade-in">
                    Não possuiu estudos vinculado ao seu grupo, fale com o administrador da conta
                </div>
            </div>
        </div>
    @endif

    </div>
@endsection

@section('javascript')
@endsection

@else
@include('errors.redirecionar')
@endif
