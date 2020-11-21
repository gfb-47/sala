@extends('layouts.app', ['pageSlug' => 'Tipos Usuario'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Tipos de Usuario</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th style="text-align: right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->nome}}</td>
                                <td style="text-align: right"><a href="{{ route('tipousuario.edit', [$item->id]) }}" class="btn btn-primary">Editar</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align:center">
                                    Não Foram encontrados Registros
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