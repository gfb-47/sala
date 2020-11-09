<div class="row">
    <div class="col-md-6">
        {!!Form::text('nome', 'Nome do Ambiente')
        ->required()
        ->attrs(['maxlength' => 45])!!}
    </div>
    <div class="col-md-6">
        {!!Form::select('tipoambiente', 'Tipo do Ambiente')
        ->options($tipoambiente->prepend('Selecione...', ''))
        ->required() !!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('termodeuso', 'Termo de Uso')
        ->required()
        ->attrs(['maxlength' => 4000])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>