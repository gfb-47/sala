<div class="navBarIndex">
    <a href=""><img src="{{ asset('img') }}/logo_unitins.png" alt="" height=auto width=130></a>
    <a class="navbar-item" href="#">Home</a>
    <a class="navbar-item" href="{{ route('profile.edit') }}">Perfil</a>
    <div class="dropdown">
        <button class="dropbtn">Agendamentos
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a class="navbar-item" href="{{ route('meusagendamentos.index') }}">Meus Agendamentos</a>
            <a class="navbar-item" href="{{ route('novoagendamento.index') }}">Agendar ambiente</a>
        </div>
    </div>
    <button class="logoutBtn" type="button">Sair</button>
</div>