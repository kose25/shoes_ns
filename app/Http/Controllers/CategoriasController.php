<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['categorias']=Categorias::paginate(20);

        return view('admin/categorias.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/categorias.create');
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
        $datosCategoria=request()->except('_token');

        Categorias::insert($datosCategoria);

        //return response()->json($datosMarca);
        return redirect('categorias')->with('mensaje','Categoria Agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoria=Categorias::findOrFail($id);

        return view('admin/categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCategoria=request()->except(['_token','_method']);
        Categorias::where('id','=', $id)->update($datosCategoria);
        $categoria=Categorias::findOrFail($id);

        //return view('admin/marca.edit', compact('marca'));
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categorias::destroy($id);

        return redirect('categorias');
    }
}
