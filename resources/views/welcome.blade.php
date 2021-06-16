@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-12">
            <h2>¿QUIENES SOMOS?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ea officiis aliquam architecto, ab consequatur dolor rem aut, adipisci modi porro, blanditiis quae ratione vel optio voluptatibus eligendi voluptas nostrum.</p>
        </div>
    </div>

    <div class="row py-4">
        <div class="col-12">
            <h2>Recientemente Agregados</h2>
        </div>

        @foreach($listados as $listado)
        <div class="col-lg-3 my-3">
            <div class="card" data-name="producto 1" data-price="4000" data-id="0">

                <!-- Card image -->
                <div class="embed-responsive embed-responsive-4by3">
                    <img class="card-img-top embed-responsive-item" src="{{asset('storage').'/'.$listado->foto}}" alt="Card image cap" style="object-fit: cover;">
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title text-break"><a>{{$listado->nombre}}</a></h4>
                    <!-- Text -->
                    <p class="card-text text-break">{{$listado->descripcioncorta}}</p>

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

@if(count($listados)> 0)
<div class="text-center">
    <a class="btn btn-success" href="{{ route('listado') }}">Ver todos los productos</a>
</div>
@endif

</div>
@endsection