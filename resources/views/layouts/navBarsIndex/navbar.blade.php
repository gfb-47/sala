<div class="navBarIndex" >
    <div class="navBarIndex_img">
        <a href=""><img src="{{ asset('img') }}/logo_unitins.png" alt="" height=auto width=130></a>
    </div>
    <div class="navbar-item-all" style="display:flex; justify-content: flex-end;flex-flow: row wrap;" >
        <a class="navbar-item" href="#">Home</a>
        @if(auth()->user()->tipo_usuario == 1)
            <a class="navbar-item" href="{{ route('home') }}">Dashboard</a>
        @endif    

        <a class="navbar-item" href="{{ route('profile.edit') }}">Perfil</a>
        <div class="dropdown" fl>
            <button class="dropbtn">Agendamentos
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a class="navbar-item" href="{{ route('meusagendamentos.index') }}">Meus Agendamentos</a>
                <a class="navbar-item" href="{{ route('novoagendamento.index') }}">Agendar ambiente</a>
            </div>
            <button class="logoutBtn" type="button">Sair</button>
        </div>
    </div>
</div>