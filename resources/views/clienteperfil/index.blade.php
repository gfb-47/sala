@extends('layouts.app', ['pageSlug' => 'Ambiente'])


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Perfil</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ambiente.create')}}" class="btn btn-secondary float-right">Criar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo Ambiente</th>
                                <th style="text-align: right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div> -->
            </div>
        </div>
    </div>
</div>
@endsection