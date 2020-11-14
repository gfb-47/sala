@extends('layouts.app', ['pageSlug' => 'Novo Agendamentos'])


@section('content')
<link href="{{ asset('css/mainCalendar.css') }}" rel="stylesheet" />
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Agendamentos</h2>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#staticBackdrop">
                            Adicionar novo
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div id='calendar'></div>
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
@include('novoagendamento.modal')   


<!-- Modal de exibição -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" data-backdrop="static"  aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="titleModal">Espaço Agendado</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="border: 1px solid #6c6c6c;padding-right: 5px;padding-left:5px"
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 style="font-weight:bold">Paciente: <span style="font-weight:normal" id="professor"></span></h4>
                <h4 style="font-weight:bold">Telefone: <span style="font-weight:normal" id="usuario"></span></h4>
                <h4 style="font-weight:bold">Clinica: <span style="font-weight:normal" id="curso"></span></h4>
                <h4 style="font-weight:bold">Profissional: <span style="font-weight:normal" id="horainicio"></span></h4>
                <h4 style="font-weight:bold">Data: <span style="font-weight:normal" id="horafim"></span></h4>
                <h4 style="font-weight:bold">Hora Agendada: <span style="font-weight:normal" id="data"></span>
                <h4 style="font-weight:bold">Motivo de Uso: <span style="font-weight:normal" id="motivo"></span>
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" id="teste" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('js/mainCalendar.js')}}">

</script>
<script src="{{asset('js/locales-all.min.js')}}">

</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,timeGridDay'

      },
      locale: 'pt-br',
      allDaySlot: false,
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      droppable: false,
      dayMaxEvents: true, // allow "more" link when too many events
      eventClick: function(element) {
            let id = element.event.id;
            let professor = element.event.extendedProps.professor;
            let usuario = element.event.extendedProps.usuario;
            let curso = element.event.extendedProps.curso;
            let disciplina = element.event.extendedProps.disciplina;
            let horainicio = element.event.extendedProps.horainicio;
            let horafim = element.event.extendedProps.horafim;
            let data = element.event.extendedProps.data;
            let motivo = element.event.extendedProps.motivo;

            $("#calendarModal").modal("show");


            $("#calendarModal #professor").text(professor);
            $("#calendarModal #usuario").text(usuario);
            $("#calendarModal #curso").text(curso);
            $("#calendarModal #disciplina").text(disciplina);
            $("#calendarModal #horainicio").text(horainicio);
            $("#calendarModal #horafim").text(horafim);
            $("#calendarModal #data").text(data);
            $("#calendarModal #motivo").text(motivo);

        },
    });

    $.get(getUrl() + '/api/v1/public/schedules/all/{{auth()->id()}}', function(data) {
        var data = data.data;
        for (var i=0; i<data.length; i++) {
            calendar.addEvent({
                    id: data[i].id,
                    title: 'Agendamento',
                    start: data[i].eventStart,
                    end: data[i].eventEnd,
                    extendedProps: {
                        professor: data[i].professor, 
                        usuario: data[i].usuario,
                        curso: data[i].curso,
                        disciplina: data[i].disciplina,
                        horainicio: data[i].horainicio,
                        horafim: data[i].horafim,
                        data: data[i].data,
                        motivo: data[i].motivo 
                    },
                    color: 'blue',
                });
        }
    }).fail(function() {
       alert('Ocorreu um Erro na Requisição');
    });
    calendar.render();
  });
  $('#inp-ambiente').on('change', function() {
    var termos = getUrl() + '/novoagendamento/1/termosdeuso';
    termos = termos.replace('1', $(this).val());
    $('.termosredirect').attr('href', termos);
  });
</script>
@endpush