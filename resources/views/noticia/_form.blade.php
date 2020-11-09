<div class="row">
    <div class="col-md-6">
        {!!Form::text('titulo', 'Título')
        ->required()
        ->attrs(['maxlength' => 45,'class'=>'required'])!!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('contudo', 'Conteúdo')
        ->required()
        ->attrs(['maxlength' => 4000])!!}
    </div>
    <div class="col-md-12">
        <!-- insira aqui o campo de imagem -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>