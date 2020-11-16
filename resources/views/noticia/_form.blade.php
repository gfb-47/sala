<div class="row">
    <div class="col-md-12">
        <label for="imagem">Imagem </label><br />
        <label id="thumbnail">
            <input class="imagem" name="imagem" type="file" class="d-none form-control @if($errors->has('image')) is-invalid @endif"
                accept="image/*" />
            @if($errors->has('image'))
            <div class="invalid-feedback">{{$errors->first('image')}}</div>
            @endif
            <img class="image-thumbnail" src="{{asset((isset($item) && $item->imagem!= null)?'storage/'.$item->imagem:'img/noimage.png')}}"
            alt="camera" />
        </label>
    </div>
    <div class="col-md-12">
        {!!Form::text('titulo', 'Título')
        ->required()
        ->attrs(['maxlength' => 45,'class'=>'required'])!!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('conteudo', 'Conteúdo')
        ->required()
        ->attrs(['maxlength' => 4000])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>