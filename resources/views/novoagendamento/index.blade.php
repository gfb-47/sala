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
        alert('Não Foi feita a requisição');
    });
    // calendar.addEvent({
    //                 id: 1,
    //                 title: 'Agendamento',
    //                 start: "2020-11-13T00:45:00",
    //                 end: "2020-11-13T01:45:00",
    //                 color: 'blue',
    //             });
    calendar.render();
  });
  $('#inp-ambiente').on('change', function() {
    var termos = getUrl() + '/novoagendamento/1/termosdeuso';
    termos = termos.replace('1', $(this).val());
    $('.termosredirect').attr('href', termos);
  });
</script>
@endpush