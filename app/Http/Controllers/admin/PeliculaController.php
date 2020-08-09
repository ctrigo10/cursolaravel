<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Pelicula;
use App\Genero;
use App\Director;
use App\Http\Requests\PeliculaCreateRequest;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::orderBy('id', 'DESC')->with('genero','directores','imagenes','user')->paginate(10);
        
        $data['peliculas'] = $peliculas;
        return view('admin.pelicula.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pelicula $pelicula)
    {   $usuarios = User::pluck('name', 'id');
        $generos = Genero::pluck('genero', 'id');
        $directores = Director::pluck('nombre', 'id');
        $data['usuarios'] = $usuarios;
        $data['generos'] = $generos;
        $data['directores'] = $directores;
        $data['pelicula'] = $pelicula;
        return view('admin.pelicula.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaCreateRequest $request)
    {
        //dd($request);die;
        $pelicula = new Pelicula($request->all());
        $pelicula->save();
        $pelicula->directores()->sync($request->director);
        flash('Película registrado correctamente')->success();
        return redirect()->route('pelicula.index');
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
        $pelicula = Pelicula::find($id);
        $usuarios = User::pluck('name', 'id');
        $generos = Genero::pluck('genero', 'id');
        $directores = Director::pluck('nombre', 'id');
        $data['usuarios'] = $usuarios;
        $data['generos'] = $generos;
        $data['directores'] = $directores;
        $data['pelicula'] = $pelicula;
        return view('admin.pelicula.edit', $data);
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
        $pelicula = Pelicula::find($id);
        $pelicula->update($request->toArray());
        $pelicula->directores()->sync($request->director);
        flash('Película editado correctamente')->success();
        return redirect()->route('pelicula.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula=Pelicula::find($id);
        if($pelicula){
            $pelicula->delete();
            $pelicula->directores()->delete();
            flash('Se ha eliminado '.$pelicula->name.' correctamente.')->success();
        }else{
            flash('Error al eliminar, no existe el id '.$id.'.')->error();
        }
        return redirect()->route('pelicula.index');
    }
}
