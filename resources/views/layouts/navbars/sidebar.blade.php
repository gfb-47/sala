<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="">
                <img src="{{ asset('img/icon_unitins_white.png') }}" alt="Logo Unitins Branca" />
            </a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='Pagina Inicial' ) class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="fas fa-home"></i>
                    <p>Página Inicial</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#Cadastros" aria-expanded="false" class="collapsed">
                    <i class="fas fa-pencil-alt"></i>
                    <span class="nav-link-text">Cadastros</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="Cadastros">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='Ambientes' ) class="active " @endif>
                            <a href="{{ route('ambiente.index')  }}">
                                <i class="fas fa-door-closed"></i>
                                <p>Ambientes</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Disciplina' ) class="active " @endif>
                            <a href="{{ route('disciplina.index')  }}">
                                <i class="fas fa-pen-nib"></i>
                                <p>Disciplinas</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Curso' ) class="active " @endif>
                            <a href="{{ route('curso.index')  }}">
                                <i class="bx bxs-book-alt"></i>
                                <p>Cursos</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Noticia' ) class="active " @endif>
                            <a href="{{ route('noticia.index')  }}">
                                <i class="icofont-newspaper"></i>
                                <p>Notícias</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Usuários' ) class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="fas fa-user-friends"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Motivos de Uso' ) class="active " @endif>
                            <a href="{{ route('motivoutilizacao.index')  }}">
                                <i class="fas fa-question-circle"></i>
                                <p>Motivos de Uso</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Movimentação" aria-expanded="false" class="collapsed">
                    <i class="fas fa-bars"></i>
                    <span class="nav-link-text">Movimentação</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="Movimentação">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='Agendamentos' ) class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="fas fa-calendar-check"></i>
                                <p>Agendamentos</p>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#GerarRelatorio" aria-expanded="false" class="collapsed">
                                <i class='fas fa-file-pdf' ></i>
                                <span class="nav-link-text">Relatorios</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse" id="GerarRelatorio">
                                <ul class="nav pl-4">
                                    <li @if ($pageSlug=='Relatório Professor' ) class="active " @endif>
                                        <a href="{{ route('professor.index')  }}">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            <p>Professor</p>
                                        </a>
                                    </li>
                                    <li @if ($pageSlug=='Relatório Geral' ) class="active " @endif>
                                        <a href="{{ route('geral.index')  }}">
                                            <i class="fas fa-globe-americas"></i>
                                            <p>Geral</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#gerenciamento" aria-expanded="false" class="collapsed">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-link-text">Gerenciamento</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="gerenciamento">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='Tipos Usuario' ) class="active " @endif>
                            <a href="{{ route('tipousuario.index')  }}">
                                <i class="fas fa-user"></i>
                                <p>Tipos Usuário</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Tipos Ambiente' ) class="active " @endif>
                            <a href="{{ route('tipoambiente.index')  }}">
                                <i class="fas fa-tools"></i>
                                <p>Tipos Ambiente</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>