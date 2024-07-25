<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;



class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos=DB::table('proyectos')->get();
        return view('proyecto.index',['proyectos'=>$proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyecto = Proyectos::find($id);
        return view('proyecto.update', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'lider' => 'required',
        ]);
        $proyectos = Proyectos::find($id);
        $proyectos->update($request->all());
        return redirect()->route('proyecto.index')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyectos = Proyectos::find($id);
        $proyectos->delete();
        return redirect()->route('proyecto.index')->with('success', 'product deleted successfully');
    }
}
