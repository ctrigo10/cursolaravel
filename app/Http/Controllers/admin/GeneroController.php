<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Genero;
use App\Http\Requests\GeneroCreateRequest;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::orderBy('id', 'DESC')->paginate(10);
        $data['generos'] = $generos;
        return view('admin.genero.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroCreateRequest $request)
    {
        $genero = new Genero($request->all());
        $genero->save();
        flash('Género registrado correctamente')->success();
        return redirect()->route('genero.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::find($id);
        $data['genero'] = $genero;
        return view('admin.genero.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genero = Genero::find($id);
        $genero->update($request->toArray());
        flash('Género editado correctamente')->success();
        return redirect()->route('genero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero=Genero::find($id);
        if($genero){
            $genero->delete();
            flash('Se ha eliminado '.$genero->name.' correctamente.')->success();
        }else{
            flash('Error al eliminar, no existe el id '.$id.'.')->error();
        }
        return redirect()->route('genero.index');
    }
}
