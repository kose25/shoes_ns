@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row py-4">
        @include('admin.menu')

        <div id="fondo-form" class="offset-md-1 col-12 col-md-6">
            <div class="row ">
                <h2 class="col-10 mt-2 pb-2">Editar Producto</h2>
            </div>
            <div class="col-12">
                <form action="{{ url('/productos/'.$producto->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PATCH')
                    @include('admin.productos.form',['modo'=>'editar'])
                </form>
            </div>
        </div>

    </div>
</div>

@endsection