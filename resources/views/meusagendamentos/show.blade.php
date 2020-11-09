@extends('layouts.app', ['pageSlug' => 'Meus agendamentos'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Visualizar agendamento</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('meusagendamentos.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Ambiente </strong></p>
                                    <p class="card-text">
                                        {{$item->ambientes->nome}}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Data </strong></p>
                                    <p class="card-text">
                                        {{brDate($item->data)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Situação </strong></p>
                                    <p class="card-text">
                                        {{$item->getSituacao()}}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Motivo </strong></p>
                                    <p class="card-text">
                                        {{$item->motivos->motivo}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Curso </strong></p>
                                    <p class="card-text">
                                        {{ $item->cursos->nome }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Disciplina </strong></p>
                                    <p class="card-text">
                                        {{ $item->disciplinas->nome }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Professor responsável </strong></p>
                                    <p class="card-text">
                                        {{ $item->professores->nome }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Motivo </strong></p>
                                    <p class="card-text">
                                        {{ $item->motivos->motivo }}
                                    </p>
                                </div>
                            </div>
                            </div>
                        <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Horario do início </strong></p>
                                    <p class="card-text">
                                        {{ $item->horainicio }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Horario do fim </strong></p>
                                    <p class="card-text">
                                        {{ $item->horafim }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection