<div class="navBarIndex" >
    <div class="navBarIndex_img">
        <a href=""><img src="{{ asset('img') }}/logo_unitins.png" alt="" height=auto width=130></a>
    </div>
    <div class="navbar-item-all">
        <a class="navbar-item" href="#">Home</a>
        @if(auth()->user()->tipo_usuario == 1)
            <a class="navbar-item" href="{{ route('home') }}">Dashboard</a>
        @endif    

        <a class="navbar-item" href="{{ route('profile.edit') }}">Perfil</a>
        <div class="dropdown">
            <button class="dropbtn">Agendamentos
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a class="navbar-item" href="{{ route('meusagendamentos.index') }}">Meus Agendamentos</a>
                <a class="navbar-item" href="{{ route('selecaoambiente.index') }}">Agendar ambiente</a>
                @if(auth()->user()->tipo_usuario == 4)
                    <a class="navbar-item" href="#">Relatório Operacional</a>
                @endif    
            </div>
           
            
                               
        </div>
        <button class="logoutBtn" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Sair</button>
    </div>
</div>