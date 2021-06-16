@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-12">
            <h2>¿QUIENES SOMOS?</h2>
            <p>Somos el Cuerpo de Bomberos Voluntarios del municipio de Villa del Rosario, Norte de Santander; somos una asociación sin ánimo de lucro, de utilidad común y con personería jurídica expedida por la Secretaría de Gobierno Departamental del Norte de Santander, organizada para la prestación del servicio público para la gestión integral del riesgo contra incendio, los preparativos y atención de rescates en todas sus modalidades y la atención de incidentes con materiales peligrosos, en los términos del Artículo 2 de la Ley 1575 del 2012 y con certificado de cumplimiento expedido por la DNBC (Dirección Nacional de Bomberos de Colombia).Desde el 27 de diciembre de 1989, nuestra institición desarrolla una constante transformación a fin alinearnos con los estándares internacionales promovidos por la NFPA, FM, UL, especialmente. Nuestro compromiso es mantenernos actualizados en las acciones que sabemos proporcionarán resultados efectivos frente a los riesgos que pudieran afectar a nuestro municipio de Villa del Rosario y que sean de nuestra competencia (Artículo 2, Ley 1575 de 2012).</p>
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