@extends('layouts.app')

@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('mensaje')}}
</div>
@endif

@section('content')
<div class="container-fluid">

    <div class="row py-4">
        @include('admin.menu')

        <div class="col-12 col-md-10">

            <div class="row">
                <h2 class="col-10 mt-2">Listado de Productos</h2>
                <a href="{{url('productos/create')}}" class="btn btn-primary px-3"><i id="plus-icon" class="fas fa-plus-circle"></i></a>
            </div>

            @isset($productos)
            <div class="col-12 table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion Corta</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->referencia}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcioncorta}}</td>
                            <td>{{$producto->valor}}</td>
                            <td>{{ $producto->estado=='0' ? 'activo':'inactivo' }}</td>
                            <td> <img src="{{asset('storage').'/'.$producto->foto}}" alt="" width="100px" class="img-fluid"> </td>
                            <td>{{$producto->categoria}}</td>
                            <td class="d-flex justify-content-center">
                                <form action="{{url('/productos/'.$producto->id.'/edit')}}" method="get">
                                    <button class="btn btn-primary px-3" id="delete-icon" type="submit"><i class="fas fa-edit"></i></button>
                                </form>
                                <a id="edit-icon" class="btn btn-primary px-3 d-none" href="{{url('/productos/'.$producto->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                <form action="{{url('/productos/'.$producto->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger px-3" id="delete-icon" type="submit" onclick="return confirm('Borrar?');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $productos->links('pagination::bootstrap-4') }}
                <div>


                </div>


            </div>

            @endisset

        </div>

        @endsection