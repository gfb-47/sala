@extends('layouts.appNoSideBar', ['pageSlug' => 'relatorio'])

@section('content')
<link href="{{ asset('css/mainCalendar.css') }}" rel="stylesheet" />
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Relatório Operacional</h2>
                    </div>
                </div>
            </div>
            <form method="get" action="{{route('relatorio.gerarRelatorioAluno')}}">
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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg float-right">Gerar Relatório</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#inp-datainicio').on('change', function(){
        $('#inp-datafim').attr('min',$(this).val()); 
    })
</script>
@endpush