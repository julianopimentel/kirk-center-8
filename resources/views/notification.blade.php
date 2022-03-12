@php
$user = auth()->user();
@endphp
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="form-groups row">
                <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                    <h4>Notificações</h4>
                </div>
                <div class="col-12">
                    <div class="activities">
                        @foreach ($user->notifications as $notification)
                            @if ($notification->type == 'App\Notifications\ConfirmEvent')
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary">{{datarecente($notification->created_at)}}</span>
                                            <div class="float-right dropdown">
                                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-title">Options</div>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-eye"></i>
                                                        View</a>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-list"></i>
                                                        Detail</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"
                                                        data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                        data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                        Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Presença confirmada no evento.</p>
                                    </div>
                                </div>
                            @endif
                            @if ($notification->type == 'App\Notifications\CancelEvent')
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary">{{datarecente($notification->created_at)}}</span>
                                            <div class="float-right dropdown">
                                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-title">Options</div>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-eye"></i>
                                                        View</a>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-list"></i>
                                                        Detail</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"
                                                        data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                        data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                        Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Presença cancelada no evento</p>
                                    </div>
                                </div>
                            @endif
                            @if ($notification->type == 'App\Notifications\AlterarSenha')
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary">{{datarecente($notification->created_at)}}</span>
                                            <div class="float-right dropdown">
                                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-title">Options</div>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-eye"></i>
                                                        View</a>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-list"></i>
                                                        Detail</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"
                                                        data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                        data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                        Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Sua senha foi alterada</p>
                                    </div>
                                </div>
                            @endif
                            @if ($notification->type == 'App\Notifications\DadosPessoas')
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary">{{datarecente($notification->created_at)}}</span>
                                            <div class="float-right dropdown">
                                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-title">Options</div>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-eye"></i>
                                                        View</a>
                                                    <a href="#" class="dropdown-item has-icon"><i
                                                            class="fas fa-list"></i>
                                                        Detail</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"
                                                        data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                        data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                        Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Seus dados pessoas foram atualizados.</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
