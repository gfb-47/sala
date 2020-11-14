@extends('layouts.app', ['pageSlug' => 'Tipos Ambiente'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Tipos de Ambiente</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('tipoambiente.create')}}" class="btn btn-secondary float-right">Criar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                @include('alerts.error')
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Dt. Criação</th>
                                <th>Dt. Atualização</th>
                                <th style="text-align: right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->nome}}</td>
                                <td>{{$item->created_at->format('d/m/Y H:i:s')}}</td>
                                <td>{{$item->updated_at->format('d/m/Y H:i:s')}}</td>
                                <td style="text-align: right"><a href="{{ route('tipoambiente.edit', [$item->id]) }}" class="btn btn-primary">Editar</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center">
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