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
                                <th>Hora de início</th>
                                <th>Hora de finalizar</th>
                                <th><span style="position: relative;left: 7.6px;">Ações<span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->ambientes->nome}}</td>
                                <td>{{brDate($item->data)}}</td>
                                <td>{{$item->users->name}}</td>
                                <td>{{$item->motivos->motivo}}</td>
                                <td>{{$item->horainicio}}</td>
                                <td>{{$item->horafim}}</td>
                                <td>
                                    <div class="group-itens" style="display: flex;justify-content:start; color: #000000;">
                                        <form action="{{route('agendamentos.confirma', $item->id)}}" id="formConfirmaAgendamento"
                                        method="POST">
                                        @csrf
                                        @method('POST')
                                            <button class=" btn btn-link fa fa-check" style="color:#00ff00"></button>
                                        </form>
                                        <form action="{{route('agendamentos.rejeita', $item->id)}}" id="formRejeitaAgendamento"
                                        method="POST">
                                        @csrf
                                        @method('POST')
                                            <button class="btn btn-link fa fa-times" style="color:#ff0000"></button>
                                        </form>
                                        <a href="{{ route('confirmaragendamento.show', $item->id) }}"
                                        style="color:#000000;margin:3.5px;" 
                                        class="btn-link fas fa-eye"></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" style="text-align:center">
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