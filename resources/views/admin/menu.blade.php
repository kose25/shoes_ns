<div class="col-2 d-none d-md-block">
    <h4>Menu</h4>
    <div class="nav flex-column" id="aside-menu" role="tablist" aria-orientation="vertical">
        <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
        <a class="nav-link active" href="{{ route('productos.index') }}">Productos</a>
        <a class="nav-link active" href="{{ route('compras.index') }}">Compras</a>
    </div>
</div>

<div class="col-12 d-block d-md-none">
    <h4>Menu</h4>
    <div class="nav flex-row" id="aside-menu" role="tablist" aria-orientation="vertical">
        <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
        <a class="nav-link active" href="{{ route('productos.index') }}">Productos</a>
        <a class="nav-link active" href="{{ route('compras.index') }}">Compras</a>
    </div>
</div>