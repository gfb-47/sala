@extends('layouts.appNoSideBar', ['page' => 'Meus Agendamentos', 'pageSlug' => 'meusagendamentos'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Meus Agendamentos</h2>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-secondary float-right" href="{{ route('selecaoambiente.index') }}">
                            Agendar ambiente
                        </a>
                    </div>
                    <div class="col-md-12">
                    @include('alerts.success')
                    @include('alerts.error')
                        <form>
                            <div class="row" style="display:flex;">
                                <div class="col-md-2 float-right">
                                {!!Form::select('situacao', '')
                                    ->options($situacao)
                                !!}
                                </div>
                                <div class="row-button" style="margin-top: 17px;">
                                    <button type="submit" class="btn btn-primary float-right" 
                                    style="height: 37px;"><span style="position:relative;bottom: 3px;">Filtrar</span></button>
                                </div>
                            </div>
                        </form>
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
                                <th>Situação</th>
                                <th>Motivo</th>
                                <th><span style="position: relative;left: 7.6px;">Ações<span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->ambientes->nome}}</td>
                                <td>{{brDate($item->data)}}</td>
                                <td>{{$item->getSituacao()}}</td>
                                <td>{{$item->motivos->motivo}}</td>
                                <td>
                                    <a href="{{ route('meusagendamentos.show', $item->id) }}" style="color:#000000; padding-left:20px;" class="fas fa-eye"></a>
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
                    @if (isset($filters))
                        {{ $data->appends($filters)->links() }}
                    @else
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection