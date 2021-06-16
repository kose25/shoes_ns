<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre" required value="{{isset($categoria->nombre)?$categoria->nombre:''}}">

</div>

<div class="form-group">
    <label for="nombre">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcion" required value="{{isset($categoria->descripcion)?$categoria->descripcion:''}}">

</div>
<div class="form-group">

    <label for="exampleFormControlSelect1">Estado</label>
    <select class="form-control" id="exampleFormControlSelect1" name="estado" id="estado">    
        <option value="0">activo</option>
        <option value="1">inactivo</option>
    </select>
</div>
<div class="row">
    <button type="submit" class="btn btn-success">{{ $modo=='crear' ? 'Agregar':'Modificar' }}</button>
    <a class="btn btn-danger px-3" href="{{url('categorias')}}">Regresar</a>
</div>