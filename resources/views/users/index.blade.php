@extends('layouts.app', ['pageSlug' => 'Usuarios'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Usuário</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('user.create')}}" class="btn btn-secondary float-right">Cadastrar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Tipo de Usuário</th>
                                <th style="text-align: right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->cpf}}</td>
                                <td>{{$item->tipoUsuario->nome}}</td>
                                <td style="text-align: right"><a href="{{ route('user.edit', [$item->id]) }}" class="btn btn-primary">Editar</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align:center">
                                    Não Foram encontrados Registros
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div> -->
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $data->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection