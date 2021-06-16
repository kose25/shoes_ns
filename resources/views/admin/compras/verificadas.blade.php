@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row py-4">
        @include('admin.menu')

        <div class="col-12 col-md-10">

            <div class="row">
                <h2 class="col-10 mt-2">Listado de Compras Verificadas</h2>
               
            </div>

            @isset($compras)
            <div class="col-12 table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Valor Compra</th>
                            <th scope="col">Fecha Compra</th>
                            <th scope="col">Fecha Validacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                        <tr>
                            <td>{{$compra->id}}</td>
                            <td>{{$compra->nombre}}</td>
                            <td>{{$compra->email}}</td>
                            <td>{{$compra->cedula}}</td>
                            <td>{{$compra->valorcompra}}</td>
                            <td>{{isset($compra->created_at)?$compra->created_at:'no hay registro'}}</td>
                            <td>{{$compra->updated_at}}</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $compras->links('pagination::bootstrap-4') }}
                <div>
                    @endisset

                </div>

                @endsection