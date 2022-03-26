@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        <div class="form-groups row">
                            <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                                <h4>{{ $category->name }}</h4>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-4 col-xl-2">
                                @if ($appPermissao->add_sermons == true)
                                    <a href="{{ route('sermons.create') }}" class="add_button btn btn-sm btn-primary"
                                        title="Adicionar"><i class="c-icon c-icon-sm cil-plus"></i></a>
                                @endif

                            </div>
                        </div>
                    </div>

                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Previsão</th>
                                <th>Titulo</th>
                                <th>Visualizações</th>
                                <th>Mensagem</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th colspan="3">
                                    <Center>{{ __('account.action') }}</Center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                @php
                                    $video = Youtube::getVideoInfo($note->codigo_url);
                                @endphp
                                <tr>
                                    <td><img src="{{ $video->snippet->thumbnails->default->url }}"
                                        ></td>
                                    <td><strong>{{ $note->title }}</strong></td>
                                    <td><strong>{{ $video->statistics->viewCount }}</strong></td>
                                    <td>
                                        @php
                                            echo mb_strimwidth($note->content, 0, 45, '...');
                                        @endphp
                                    </td>
                                    @if ($appPermissao->view_sermons == true)
                                    <td>{{ datarecente($note->created_at) }}</td>
                                    <td>
                                        <span class="{{ $note->status->class }}">
                                            {{ $note->status->name }}
                                        </span>
                                    </td>
                                    @endif
                                    <td width="1%">
                                        @if ($appPermissao->view_sermons == true)
                                            <a href="{{ route('sermons.show', $note->id) }}"><i
                                                    class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                        @endif
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->edit_sermons == true)
                                            <a href="{{ route('sermons.edit', $note->id) }}"><i
                                                    class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                        @endif
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->delete_sermons == true)
                                            <form action="{{ route('sermons.destroy', $note->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                                        class="c-icon c-icon-sm cil-trash text-danger"></i></a>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notes->links() }}
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
