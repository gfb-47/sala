@extends('layouts.app', ['pageSlug' => 'Cliente Agendamento'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Ambientes Disponíveis</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome Ambiente</th>
                                <th>Tipo Ambiente</th>
                                <th style="text-align: right">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->nome}}</td>
                                <td>{{$item->tipoAmbiente->nome}}</td>
                                <td style="text-align: right"><a href="{{ route('novoagendamento.index',$item->id) }}" class="btn btn-primary">Agendar</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align:center">
                                    Não foram encontrados registros
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