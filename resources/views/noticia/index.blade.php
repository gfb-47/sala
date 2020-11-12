@extends('layouts.app', ['pageSlug' => 'Noticia'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Notícias</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('noticia.create')}}" class="btn btn-secondary float-right">Criar Nova</a>
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
                                <th>Título</th>
                                <th>Criado por</th>
                                <th>Data de Criação</th>
                                <th style="text-align: right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->titulo}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td style="text-align: right"><a href="{{ route('noticia.edit', [$item->id]) }}" class="btn btn-primary">Editar</a></td>
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