@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row py-4">
        @include('admin.menu')

        <div class="col-12 col-md-10">

            <div class="row">
                <h2 class="col-10 mt-2">Listado de Compras</h2>

            </div>

            @isset($compras)
            <div class="col-12 table-responsive">
                <table class="table" id="dtBasicExample">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Valor Compra</th>
                            <th scope="col">Fecha Compra</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Accion</th>
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
                            <td>{{$compra->verificada=='0' ? 'Pendiente':'Verificada' }}</td>
                            <td class="d-flex justify-content-center">
                                <form action="{{url('/compras/'.$compra->id)}}" method="POST">
                                    {{csrf_field()}}
                                    @method('PATCH')
                                    <input type="hidden" name="verificada" value="{{$compra->verificada=='0' ? '1':'0'}}">
                                    <button type="submit" class="{{$compra->verificada=='0' ? 'btn btn-success':'btn btn-danger' }}" onclick="return confirm('Realizar accion?');">{{$compra->verificada=='0' ? 'Validar':'Desvalidar' }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div>
                    @endisset

                </div>

                

                @endsection