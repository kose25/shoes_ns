<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compras = Compras::select('c.id', 'c.valorcompra', 'c.verificada', 'c.created_at',  'u.name as nombre', 'u.email', 'u.cedula')
            ->from('compras as c')
            ->join('users as u', function ($join) {
                $join->on('u.id', '=', 'c.usuario');
            })
            //->where('c.verificada', '=', '0')
            ->orderBy('id', 'desc')
            ->get();
            //->paginate(20);
        return view('admin/compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $pselink = 'https://www.psepagos.co/PSEHostingUI/ShowTicketOffice.aspx?ID=2742';
        $usuario = $request->input('usuario');
        //$descripcion_pago = $request->input('descripcion_pago');
        $valortotal = $request->input('valorcompra');
        $cedula = $request->input('cedula');
        $datosCompras = request()->except('_token', 'btnPay', 'descripcion_pago', 'cedula');
        Compras::insert($datosCompras);
        //return response()->json($datosMarca);
        //return redirect('categorias');
        return redirect()->away($pselink . '&id_cliente=' . $cedula . '&descripcion_pago=Tienda Bomberos&total_con_iva=' . $valortotal . '&btnPay=Pagar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show(Compras $compras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function edit(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
       //
       $datosCompra=request()->except(['_token','_method']);
       Compras::where('id','=', $id)->update($datosCompra);
       //$categoria=Categorias::findOrFail($id);

       //return view('admin/marca.edit', compact('marca'));
       return redirect('compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compras $compras)
    {
        //
    }

    public function verificadas(){
        $compras = Compras::select('c.id', 'c.valorcompra', 'c.verificada', 'c.created_at',  'u.name as nombre', 'u.email', 'u.cedula', 'c.updated_at')
            ->from('compras as c')
            ->join('users as u', function ($join) {
                $join->on('u.id', '=', 'c.usuario');
            })
            ->where('c.verificada', '=', '1')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);
        return view('admin/compras.verificadas', compact('compras'));
    }
}
