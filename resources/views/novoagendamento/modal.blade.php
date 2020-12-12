<!-- Modal -->
<style>
</style>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Novo Agendamento
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!!Form::open()
            ->post()
            ->route('novoagendamento.store')
            ->multipart()!!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        {!!Form::select('ambiente', 'Ambiente')
                        ->options($ambiente->prepend('Selecione...', ''))
                        ->disabled(true)
                        ->value($id)
                        ->required() !!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::date('data', 'Dia do Agendamento')
                        ->min(auth()->user()->tipo_usuario==1 ? '' : (auth()->user()->tipo_usuario==3 ? now()->format('Y-m-d') : now()->add(2, 'day')->format('Y-m-d')))
                        ->required() !!}
                    </div>
                    <div class="col-md-3">
                        {!!Form::time('horainicio', 'Hora de inicio')
                        ->required() !!}
                    </div>
                    <div class="col-md-3">
                        {!!Form::time('horafim', 'Hora de finalização')
                        ->required() !!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::select('curso', 'Curso')
                        ->options($curso->prepend('Selecione...', ''))
                        ->required() !!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::select('disciplina', 'Disciplina')
                        ->required() !!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::select('professorresponsavel', 'Professor responsavel')
                        ->options($prof->prepend('Selecione...', ''))
                        ->required() !!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::select('motivoutilizacao', 'Motivo da utilização')
                        ->options($motivo->prepend('Selecione...', ''))
                        ->required() !!}
                    </div>
                    <div class="col-md-12">
                        {!!Form::textarea('observacao', 'Observações')
                        ->required(false) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck1" required="required">
                            <label for="customCheck1">
                                <a class="termosredirect" href="{{asset('/storage/' . $termo_de_uso->termodeuso)}}"
                                    target="_blank">Li e aceito os termos de uso</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <button type="submit" class="btn btn-primary  float-right">Finalizar</button>
                        <button type="button" class="btn btn-secondary  float-right" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>

            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
@push('js')
<script>
    $('#inp-horafim').prop('disabled', true);

    $('#inp-horainicio').on('change', function(){
        $('#inp-horafim').prop('disabled', false);
    });

    $('#inp-disciplina').prop('disabled', true);
    $('#inp-curso').on('change', function() {
        const curso = $(this).val();
        $('#inp-disciplina').prop('disabled', false);
        $.get(getUrl() + '/api/v1/public/disciplinas/all/' + curso, function(data) {
            $('#inp-disciplina').empty();
            var data = data.data;
            var str = '';
            str += '<option value selected>Selecione uma Disciplina</option>';
            for (var i = 0; i < data.length; i++) {
                str += '<option value="' + data[i].id + '">' + data[i].name + '</option>'
            }
            $('#inp-disciplina').append(str);
        });
    });
</script>
@endpush