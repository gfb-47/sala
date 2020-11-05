<!-- Modal -->
<style>
</style>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" 
data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 
aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Novo Agendamento
                </h5>
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
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
                            ->required() !!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::date('data', 'Dia do Agendamento')
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
                            ->options($disciplina->prepend('Selecione...', ''))
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
                            ->required() !!}
                        </div>                 
                    </div>
            </div>
            <div class="row">
            <div class="col-md-6"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-secondary  " data-dismiss="modal">Cancelar</button>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary  ">Finalizar</button>
                </div>
            </div>
                    {!!Form::close()!!}
        </div>
    </div>
</div>  