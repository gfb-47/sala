<div class="row">
    <div class="col-md-6">
        {!!Form::text('nome', 'Nome')
        ->required()
        ->attrs(['maxlength' => 50,'class'=>'required'])!!}
    </div>
    <div class="col-md-6">
        {!!Form::select('tipo_usuario', 'Tipo de Usuário')
        ->options($tipoUsuario->prepend('Selecione...', ''))
        ->required() !!}
    </div>
    <div class="col-md-12">
        {!!Form::text('email', 'Email do Usuário')
        ->type('email')
        ->required()
        ->attrs(['maxlength' => 120])!!}
    </div>
    <!-- esperar indicação da documentação  -->

    <!-- <div class="col-md-12">
        {!!Form::text('password', 'Senha')
        ->required()
        ->attrs(['maxlength' => 4000])!!}
    </div> -->

    <div class="col-md-12">
        {!!Form::text('matricula', 'Matrícula do Usuário')
        ->required()
        ->attrs(['maxlength' => 18])!!}
    </div>
    <div class="col-md-12">
        {!!Form::text('cpf', 'CPF do Usuário')
        ->required()
        ->attrs(['class'=>'cpf'])!!}
    </div>
    <div class="col-md-12">
        {!!Form::text('telefone', 'Telefone do Usuário')
        ->required()
        ->attrs(['class'=>'phone'])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>