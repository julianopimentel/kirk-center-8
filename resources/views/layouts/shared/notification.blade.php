@foreach ($user->notifications as $notification)
    @if ($notification->type == 'App\Notifications\ConfirmEvent')
        <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="dropdown-item-desc">
                Presença confirmada no evento
                <div class="time text-primary">2 Min Ago</div>
            </div>
        </a>
    @endif
    @if ($notification->type == 'App\Notifications\CancelEvent')
        <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-info text-white">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="dropdown-item-desc">
                Presença cancelada no evento
                <div class="time text-primary">2 Min Ago</div>
            </div>
        </a>
    @endif
    @if ($notification->type == 'App\Notifications\AlterarSenha')
        <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-danger text-white">
                <i class="fas fa-lock"></i>
            </div>
            <div class="dropdown-item-desc">
                Sua senha foi alterada
                <div class="time text-primary">2 Min Ago</div>
            </div>
        </a>
    @endif
    @if ($notification->type == 'App\Notifications\DadosPessoas')
    <a href="#" class="dropdown-item dropdown-item-unread">
        <div class="dropdown-item-icon bg-success text-white">
            <i class="fas fa-heart"></i>
        </div>
        <div class="dropdown-item-desc">
            Seus dados pessoas foram atualizados.
            <div class="time text-primary">2 Min Ago</div>
        </div>
    </a>
@endif
@endforeach
