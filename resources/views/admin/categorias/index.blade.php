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
                <h2 class="col-10 mt-2">Listado de Categorias</h2>
                <a href="{{url('categorias/create')}}" class="btn btn-primary px-3" ><i id="plus-icon" class="fas fa-plus-circle"></i></a>
            </div>

            @isset($categorias)
            <div class="col-12 table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                            <td>{{ $categoria->estado=='0' ? 'activo':'inactivo' }}</td>
                            <td class="d-flex justify-content-center">
                                <form action="{{url('/categorias/'.$categoria->id.'/edit')}}" method="get">
                                    <button class="btn btn-primary px-3" id="delete-icon" type="submit"><i class="fas fa-edit"></i></button>
                                </form>
                                <a id="edit-icon" class="btn btn-primary px-3 d-none" href="{{url('/categorias/'.$categoria->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                <form action="{{url('/categorias/'.$categoria->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger px-3" id="delete-icon" type="submit" onclick="return confirm('Borrar?');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categorias->links('pagination::bootstrap-4') }}
                <div>
                    @endisset

                </div>

                @endsection