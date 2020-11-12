@extends('layouts.app', ['pageSlug' => 'Relatório Professor'])

@section('content')
<link href="{{ asset('css/mainCalendar.css') }}" rel="stylesheet" />
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Relatório Professor</h2>
                    </div>
                </div>
            </div>
            <form method="get" action="{{route('relatorio.gerarRelatorioProf')}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!!Form::date('datainicio', 'Dia Início')
                            ->required() !!}
                        </div>                 
                        <div class="col-md-6">
                            {!!Form::date('datafim', 'Dia Fim')
                            ->required() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            {!!Form::select('professorresponsavel', 'Professor responsavel')
                            ->options($prof->prepend('Selecione...', ''))
                            ->required() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Gerar Relatório</button>
                        </div>
                    </div>
                </div>
            </form>
           
            
        </div>
    </div>
</div>
@endsection