<div class="row">
    <div class="col-md-12">
        <label for="image">Imagem</label>
        <br>
        <img id="preview-image"
            src="{{asset((isset($item) && $item->image!= null)?'storage/'.$item->image:'img/noimage.png')}}"
            class="img-fluid" width="250" height="150" />
        <br />
        <a href="javascript:window.utilities.changeImage();" class="btn btn-darker">Trocar Imagem</a>
        <input type="file" name="image" id="image"
            class="d-none form-control @if($errors->has('image')) is-invalid @endif" accept="image/*">
        @if($errors->has('image'))
        <div class="invalid-feedback">{{$errors->first('image')}}</div>
        @endif
    </div>
    <div class="col-md-12">
        {!!Form::text('titulo', 'Título')
        ->required()
        ->attrs(['maxlength' => 45,'class'=>'required'])!!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('contudo', 'Conteúdo')
        ->required()
        ->attrs(['maxlength' => 4000])!!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>