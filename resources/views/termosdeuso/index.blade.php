@extends('layouts.app', ['pageSlug' => 'Termos de uso'])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Termos de uso</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                <div class="card-deck">
                            <div class="card m-2 shadow-lg">
                                <div class="card-body">
                                    <p><strong>Termos de uso </strong></p>
                                    <p class="card-text">
                                        {{ $data->termodeuso }}
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
                
                <!-- <div class="chart-area">
                    <canvas id="chartBig1"></canvas>
                </div> -->
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                   
                </nav>
            </div>
        </div>
    </div>
</div>      
@endsection