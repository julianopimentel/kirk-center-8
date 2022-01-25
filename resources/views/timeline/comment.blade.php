@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('comment.update', $comment->id) }}">
                            @csrf
                            <div class="form-group row">
                                <textarea class="form-control" id='comment' name="comment" rows="5"
                                >{{ $comment->comment}}</textarea>
                            </div>
                            <button class="btn btn-success" type="submit" title="Salvar"><i
                                class="c-icon c-icon-sm cil-save"></i></button>
                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
