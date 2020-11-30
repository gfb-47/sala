@extends('layouts.app', ['pageSlug' => 'confirmaragendamento'])


@section('content')
<link href="{{ asset('css/mainCalendar.css') }}" rel="stylesheet" />
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Agendamentos Pendentes</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ambiente</th>
                                <th>Data</th>
                                <th>Requerente</th>
                                <th>Motivo</th>
                                <th style="text-align: right">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->ambientes->nome}}</td>
                                <td>{{brDate($item->data)}}</td>
                                <td>{{$item->users->name}}</td>
                                <td>{{$item->motivos->motivo}}</td>
                                <td style="text-align: right">
                                    <a href="{{ route('confirmaragendamento.show', $item->id) }}"
                                    style="color:#000000" 
                                    class="fas fa-eye"></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center">
                                    Não foram encontrados registros
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
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