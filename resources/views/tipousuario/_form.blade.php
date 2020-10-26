<div class="row">
    <div class="col-md-12">
        {!!Form::text('nome', 'Nome')
        ->required()
        ->attrs(['maxlegnth' => 50])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>
