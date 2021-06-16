<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <script src="https://unpkg.com/cart-localstorage@1.1.4/dist/cart-localstorage.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark elegant-color">
        <a class="navbar-brand d-none d-xs-none d-sm-none d-md-none d-lg-block" href="{{ url('/') }}">
            <img src="{{ asset('img/Brown Rectangle Photography Logo (1) sas.png') }}" height="30" class="d-inline-block align-top" alt="mdb logo"> {{ config('app.name', 'Laravel') }}
        </a>

        <a class="navbar-brand d-block d-xs-none d-sm-block d-md-block d-lg-none" href="{{ url('/') }}">
            <img src="{{ asset('img/Brown Rectangle Photography Logo (1) sas.png') }}" height="30" class="d-inline-block align-top" alt="mdb logo"> {{ config('app.name', 'Laravel') }}
        </a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">


            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalCart"><i class="fas fa-shopping-cart"></i>Carrito</a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div id="contenedor-desplegable" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        @if(Auth::user()->role=='1')
                        <a class="dropdown-item" href="{{ route('productos.index') }}">Administrar</a>
                        @endif


                        <a id="dropdown-logout" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest


            </ul>
            <!-- Links -->

            <!--<form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>-->
        </div>
        <!-- Collapsible content -->

    </nav>

    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>

        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox" style="height: 300px;">
            <!--First slide-->
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/hermes-rivera-OX_en7CXMj4-unsplash.jpg') }}" alt="First slide">
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/riyan-ong-j1PxAa2U-T4-unsplash.jpg') }}" alt="Second slide">
            </div>
            <!--/Second slide-->

        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small elegant-color pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">{{ config('app.name', 'Laravel') }}</h5>
                    <p>Tienda</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Nuestras Redes</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#"><i class="fab fa-facebook fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-envelope fa-3x"></i></a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright  {{ config('app.name', 'Laravel') }}

        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    @isset($listados)
    @foreach($listados as $listado)
    <div id="ModalProducto{{$listado->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gridModalLabel">{{$listado->nombre}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <img src="{{asset('storage').'/'.$listado->foto}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="text-break">Descripcion:</h4>
                                <p class="text-break"> {{$listado->detalle}}</p>

                                <h4>Categoria: {{$listado->categoria}}</h4>

                                <h4>Precio: $ {{$listado->valor}}</h4>


                                <button type="button" class="btn btn-primary" onClick="cartLS.add({id: {{$listado->id}} , name: '{{$listado->nombre}}', price: {{$listado->valor}}})"><i class="fas fa-cart-plus fa-2x"></i></button>

                            </div>
                        </div>

                        <div class="row">

                        </div>

                        <br>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    @endisset

    <!-- Modal: modalCart -->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tu Carrito</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Producto</th>
                                    <th colspan="3">Cantidad</th>
                                    <th>Precio</th>
                                    <th class="text-center">Quitar</th>
                                </tr>
                            </thead>
                            <tbody id="cartItems" class="cart">
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">Total: <strong class="total"></strong></td>
                                <td></td>
                            </tfoot>
                        </table>

                    </div>



                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button class="btn btn-outline-warning" onClick="cartLS.destroy()">Vaciar carro</button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <!--                    <button class="btn btn-primary">Checkout</button>-->
                    <!-- <a href="#" class="btn btn-primary paguito" target="_blank">Checkout</a> -->
                    <form action="{{url('/compras')}}" method="post" target="_blank">
                        {{csrf_field()}}
                        <input type="hidden" value="{{isset(Auth::user()->cedula)?Auth::user()->cedula:''}}" name="cedula">
                        <input type="text" name="usuario" required class="d-none" value="{{isset(Auth::user()->cedula, Auth::user()->email_verified_at )?Auth::user()->id:''}}">
                        <input type="text" name="descripcion_pago" required class="d-none">
                        <input type="text" name="valorcompra" required class="d-none">
                        <input type="hidden" name="btnPay" value="Pagar">
                        @if(isset(Auth::user()->cedula, Auth::user()->email_verified_at))
                        <button type="submit" class="btn btn-success waves-effect waves-light">Pagar</button>
                        @else
                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="popover" title="Aviso" data-content="Por favor inicie sesion con una cuenta verificada para poder comprar">Pagar</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalCart -->

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>




    <script>
        function renderCart(items) {
            const $cart = document.querySelector(".cart")
            const $total = document.querySelector(".total")
            //const $pago = document.querySelector(".paguito")

            $cart.innerHTML = items.map((item) => `
					<tr>
						<td>${item.id}</td>
						<td>${item.name}</td>
						<td>${item.quantity}</td>
						<td style="width: 60px;">	
							<button type="button" class="btn btn-block btn-sm btn-outline-primary"
								onClick="cartLS.quantity(${item.id},1)">+</button>
						</td>
						<td style="width: 60px;">	
							<button type="button" class="btn btn-block btn-sm btn-outline-primary"
								onClick="cartLS.quantity(${item.id},-1)">-</button>
						</td>
						<td class="text-center">$${item.price}</td>
						<td class="text-center"><Button class="btn btn-danger" onClick="cartLS.remove(${item.id})">Quitar</Button></td>
					</tr>`).join("")

            $total.innerHTML = "$" + cartLS.total()
            //$pago.setAttribute('href', 'https://www.psepagos.co/PSEHostingUI/BasicTicketOffice.aspx?ID=2742&' + 'id_cliente=1234' + '&descripcion_pago=StoreBomberos' + '&total_con_iva=' + cartLS.total() + '&btnPay=Pagar')
            //document.querySelector('[name="id_cliente"]').setAttribute('value','sdasd');
            document.querySelector('[name="descripcion_pago"]').setAttribute('value', 'tienda');
            document.querySelector('[name="valorcompra"]').setAttribute('value', cartLS.total());

            //document.querySelector('[name="id_cliente"]').setAttribute('value','sdasd');
        }

        renderCart(cartLS.list())
        cartLS.onChange(renderCart)
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                "pageLength": 25,
                "order": [],
                columnDefs: [{
                    orderable: false,
                    targets: 7
                }],
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros por pagina",
                    info: "Mostrando pagina _PAGE_ de _PAGES_",
                    zeroRecords: "Ningun registro encontrado",
                    infoFiltered: "(filtrado de _MAX_ registros)",
                    paginate: {
                        first: "Primera",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    }
                }

            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>

    <script type="text/javascript">
        // popovers Initialization
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

</body>

</html>