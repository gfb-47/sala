@include('alerts.success')
@include('alerts.error')
<div class="row">
    <div class="col-md-12">
        {!!Form::text('nome', 'Nome')
        ->required()
        ->attrs(['maxlength' => 50])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>
