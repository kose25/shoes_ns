<div class="form-group row">
    <label for="referencia" class="col-sm-2 col-form-label">Referencia</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="referencia" name="referencia" aria-describedby="referencia" required value="{{isset($producto->referencia)?$producto->referencia:''}}" maxlength="20">

    </div>


</div>

<div class="form-group row">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre" required value="{{isset($producto->nombre)?$producto->nombre:''}}" maxlength="100">

    </div>
</div>

<div class="form-group row">
    <label for="descripcioncorta" class="col-sm-2 col-form-label">Descripcion Corta</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="descripcioncorta" name="descripcioncorta" aria-describedby="descripcion corta" required value="{{isset($producto->descripcioncorta)?$producto->descripcioncorta:''}}" maxlength="250">
    </div>
</div>

<div class="form group row">
    <label for="detalle" class="col-sm-2 col-form-label">Detalle</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="detalle" name="detalle" rows="5" required>{{isset($producto->detalle)?$producto->detalle:''}}</textarea>
    </div>
</div>

<div class="form group row">
    <label for="valor" class="col-sm-2 col-form-label">Valor</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="valor" name="valor" aria-describedby="valor" required value="{{isset($producto->valor)?$producto->valor:''}}" min="1" max="9999999">
    </div>
</div>


<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Estado</label>
    <div class="col-sm-5">
        <select class="form-control" id="exampleFormControlSelect1" name="estado" id="estado">
            <option value="0">activo</option>
            <option value="1">inactivo</option>
        </select>
    </div>

</div>
@if(isset($producto->foto))

<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-5">
        <img src="{{asset('storage').'/'.$producto->foto}}" alt="" class="img-fluid">
    </div>
</div>

@endif
<div class="form-group">
    <label for="exampleFormControlSelect1">Foto</label>
    <input type="file" name="foto" accept="image/*" id="foto"  {{$modo=='crear' ? 'required':''}}/>
</div>

<div class="form-group row">
    <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
    <div class="col-sm-10">
        <select class="form-control" id="categoria" name="id_categoria" required>
            @foreach($categorias as $categoria)

            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="row">
    <button type="submit" class="btn btn-success">{{ $modo=='crear' ? 'Agregar':'Modificar' }}</button>
    <a class="btn btn-danger px-3" href="{{url('productos')}}">Regresar</a>
</div>