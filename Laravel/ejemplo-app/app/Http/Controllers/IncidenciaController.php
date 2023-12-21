<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("incidencianewform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia;
        $incidencia->latitud = doubleval($request->latitud);
        $incidencia->longitud = $request->longitud;
        $incidencia->ciudad = $request->ciudad;
        $incidencia->direccion = $request->direccion;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->estado="abierta";

        $incidencia->save();
        return redirect('/incidencias');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incidencia = Incidencia::find($id);
        return view('incidenciaDetalle',['incidencia'=> $incidencia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Incidencia::destroy($id);
        return redirect('/incidencias');
    }
}
