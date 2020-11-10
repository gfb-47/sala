@extends('layouts.app', ['pageSlug' => 'Relatorio Geral'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Relatório Geral</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('relatorio.gerarRelatorioGeral')}}" class="btn btn-secondary float-right">Gerar Relatório</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                   
                </div>

                <!-- <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div> -->
            </div>
            
        </div>
    </div>
</div>
@endsection