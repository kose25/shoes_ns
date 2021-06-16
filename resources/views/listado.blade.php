@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row py-4">

        <div class="col-2 d-none d-md-block">
            <h4>Menu</h4>
            <div class="nav flex-column" id="aside-menu" role="tablist" aria-orientation="vertical">
                <h5>Categorias</h5>
                @isset($categorias)
                @foreach($categorias as $categoria)
                <a class="nav-link" href="{{url('/listado/filter/'.$categoria->id)}}">{{$categoria->nombre}}</a>
                @endforeach
                @endisset
            </div>
        </div>

        <div class="col-12 col-md-8">
            <h2>Listado de Productos</h2>
            <div class="col-12">
                <div class="input-group mb-3 d-none">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Buscar</button>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
                <div class="d-sm-block d-md-none">
                    <ul class="nav justify-content-center">
                        @isset($categorias)
                        @foreach($categorias as $categoria)
                        <a class="nav-link" href="{{url('/listado/filter/'.$categoria->id)}}">{{$categoria->nombre}}</a>
                        @endforeach
                        @endisset
                    </ul>
                </div>
            </div>

            <div class="row">
                @foreach($listados as $listado)
                <div class="col-lg-4 my-3">
                    <div class="card" data-name="producto 1" data-price="4000" data-id="0">

                        <!-- Card image -->
                        <div class="embed-responsive embed-responsive-4by3">
                            <img class="card-img-top embed-responsive-item" src="{{asset('storage').'/'.$listado->foto}}" alt="Card image cap" style="object-fit: cover;">
                        </div>


                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title"><a>{{$listado->nombre}}</a></h4>
                            <!-- Text -->
                            <p class="card-text">{{$listado->descripcioncorta}}</p>

                            <p>Precio: ${{$listado->valor}}</p>


                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary" onClick="cartLS.add({id: {{$listado->id}} , name: '{{$listado->nombre}}', price: {{$listado->valor}}})"><i class="fas fa-cart-plus fa-2x"></i></button>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalProducto{{$listado->id}}">Ver mas</a>

                            </div>



                        </div>

                    </div>
                    <!-- Card -->

                </div>
                @endforeach

            </div>
        </div>









    </div>
    <div class="text-center">
        <!-- <button class="btn btn-success">Ver mas productos</button> -->
        {{ $listados->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection