<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <!-- <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a> -->
            <a href="">
                <img src="{{ asset('img/icon_unitins_white.png') }}" alt="Logo Unitins Branca" />
            </a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='Pagina Inicial' ) class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="fas fa-home"></i>
                    <p>{{ _('Página Inicial') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#Cadastros" aria-expanded="false" class="collapsed">
                    <i class="fas fa-pencil-alt"></i>
                    <span class="nav-link-text">{{ __('Cadastros') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="Cadastros">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='profile' ) class="active " @endif>
                            <a href="{{ route('ambiente.index')  }}">
                                <i class="fas fa-door-closed"></i>
                                <p>{{ _('Ambientes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Disciplina' ) class="active " @endif>
                            <a href="{{ route('disciplina.index')  }}">
                                <i class="fas fa-pen-nib"></i>
                                <p>{{ _('Disciplinas') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Curso' ) class="active " @endif>
                            <a href="{{ route('curso.index')  }}">
                                <i class="bx bxs-book-alt"></i>
                                <p>{{ _('Cursos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Noticia' ) class="active " @endif>
                            <a href="{{ route('noticia.index')  }}">
                                <i class="icofont-newspaper"></i>
                                <p>{{ _('Notícias') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="fas fa-user-friends"></i>
                                <p>{{ _('Usuários') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a href="{{ route('motivoutilizacao.index')  }}">
                                <i class="fas fa-question-circle"></i>
                                <p>{{ _('Motivos de Uso') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Movimentação" aria-expanded="false" class="collapsed">
                    <i class="fas fa-bars"></i>
                    <span class="nav-link-text">{{ __('Movimentação') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="Movimentação">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='profile' ) class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="fas fa-calendar-check"></i>
                                <p>{{ _('Agendamentos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a data-toggle="collapse" href="#GerarRelatorio" aria-expanded="false" class="collapsed">
                                <i class='fas fa-file-pdf' ></i>
                                <span class="nav-link-text">{{ __('Relatorios') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
                            <div class="collapse show" id="GerarRelatorio">
                                <ul class="nav pl-4">
                                    <li @if ($pageSlug=='profile' ) class="active " @endif>
                                        <a href="{{ route('professor.index')  }}">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            <p>{{ _('Professor') }}</p>
                                        </a>
                                    </li>
                                    <li @if ($pageSlug=='profile' ) class="active " @endif>
                                        <a href="{{ route('geral.index')  }}">
                                            <i class="fas fa-globe-americas"></i>
                                            <p>{{ _('Geral') }}</p>
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
                    <span class="nav-link-text">{{ __('Gerenciamento') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="gerenciamento">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='Tipo Usuario' ) class="active " @endif>
                            <a href="{{ route('tipousuario.index')  }}">
                                <i class="fas fa-user"></i>
                                <p>{{ _('Tipo Usuário') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='Tipo Ambiente' ) class="active " @endif>
                            <a href="{{ route('tipoambiente.index')  }}">
                                <i class="fas fa-tools"></i>
                                <p>{{ _('Tipo Ambiente') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ _('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('Upgrade to PRO') }}</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>