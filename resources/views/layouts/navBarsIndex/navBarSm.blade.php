<div class="navBarIndexSm" >
    <div class="navBarIndexSm_img">
        <a href=""><img src="{{ asset('img') }}/logo_unitins.png" alt="" height=auto width=130></a>
    </div>
    <div class="item-navbar-all">
        <a class="item-navbar" href="/index">Página Inicial</a>
        @if(auth()->user()->tipo_usuario == 1)
            <a class="item-navbar" href="{{ route('user.index') }}">Dashboard</a>
        @endif    

        <a class="item-navbar" href="{{ route('perfil.index') }}">Perfil</a>
        <div class="dropdownn">
            <button class="dropbtnn">Agendamentos
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="content-dropdown">
                <a class="item-navbar" href="{{ route('meusagendamentos.index') }}">Meus Agendamentos</a>
                <a class="item-navbar" href="{{ route('selecaoambiente.index') }}">Agendar Ambiente</a>
                @if(auth()->user()->tipo_usuario == 4)
                    <a class="item-navbar" href="{{ route('relatorio.operacional') }}">Relatório Operacional</a>
                @endif    
            </div>           
        </div>
        <button class="logoutBtn" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Sair</button>
    </div>
</div>