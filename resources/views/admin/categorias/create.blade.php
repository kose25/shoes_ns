@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row py-4">
        @include('admin.menu')

        <div id="fondo-form" class="offset-md-1 col-12 col-md-6">
            <div class="row ">
                <h2 class="col-10 mt-2 pb-2">Registro de Nueva Categoria</h2>
            </div>
            <div class="col-12">
                <form action="{{ url('/categorias') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @include('admin.categorias.form',['modo'=>'crear'])
                </form>
            </div>
        </div>

    </div>
</div>

@endsection