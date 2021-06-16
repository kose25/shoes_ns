<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Productos::select('p.id', 'p.referencia', 'p.nombre', 'p.descripcioncorta', 'p.detalle', 'p.valor', 'p.estado', 'p.foto', 'c.nombre as categoria')
            ->from('productos as p')
            ->join('categorias as c', function ($join) {
                $join->on('c.id', '=', 'p.id_categoria');
            })
            ->paginate(20);

        return view('admin/productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = DB::table('categorias')->select('id', 'nombre')
            ->where('estado', '=', 0)
            ->get();
            return view('admin/productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosProducto = request()->except('_token');

        if ($request->hasFile('foto')) {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Productos::insert($datosProducto);

        //return response()->json($datosMarca);
        return redirect('productos')->with('mensaje','Producto Agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Productos::findOrFail($id);
        $categorias = DB::table('categorias')->select('id', 'nombre')->get();
        return view('admin/productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosProducto = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {

            $producto = Productos::findOrFail($id);
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Productos::where('id', '=', $id)->update($datosProducto);
        $producto = Productos::findOrFail($id);

        //return view('admin/marca.edit', compact('marca'));
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = Productos::findOrFail($id);
        if (Storage::delete('public/' . $result->foto)) {
            Productos::destroy($id);
        }


        return redirect('productos');
    }

    public function list()
    {
        $listados = Productos::select('p.id', 'p.nombre', 'p.descripcioncorta', 'p.detalle', 'p.valor', 'p.foto', 'c.nombre as categoria')
            ->from('productos as p')
            ->join('categorias as c', function ($join) {
                $join->on('p.id_categoria', '=', 'c.id')
                    ->where('p.estado', '=', '0')
                    ->where('c.estado', '=', '0');
            })            
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        return view('welcome', compact('listados'));
    }

    public function listAll()
    {
        $listados = Productos::select('p.id', 'p.nombre', 'p.descripcioncorta', 'p.detalle', 'p.valor', 'p.foto', 'c.nombre as categoria')
            ->from('productos as p')
            ->join('categorias as c', function ($join) {
                $join->on('p.id_categoria', '=', 'c.id')
                    ->where('p.estado', '=', '0')
                    ->where('c.estado', '=', '0');
            })           
            ->paginate(8);

        $categorias = DB::table('categorias')->select('id', 'nombre')
            ->where('estado', '=', 0)
            ->get();

        return view('listado', compact('listados', 'categorias'));
    }

    public function filter($id)
    {
        $listados = Productos::select('p.id', 'p.nombre', 'p.descripcioncorta', 'p.detalle', 'p.valor', 'p.foto', 'c.nombre as categoria')
            ->from('productos as p')
            ->join('categorias as c', function ($join) use ($id) {
                $join->on('p.id_categoria', '=', 'c.id')
                    ->where('p.estado', '=', '0')
                    ->where('c.estado', '=', '0')
                    ->where('c.id','=', $id);
            })
            ->paginate(8);

        $categorias = DB::table('categorias')->select('id', 'nombre')
            ->where('estado', '=', 0)
            ->get();

        return view('listado', compact('listados', 'categorias'));
    }
    
}
