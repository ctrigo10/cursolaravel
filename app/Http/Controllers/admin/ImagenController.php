<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pelicula;
use App\Imagen;
use App\Http\Requests\ImagenCreateRequest;
use File;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pelicula $pelicula)
    {
        $pelicula->imagenes;
        
        $data['pelicula'] = $pelicula;
        return view('admin.imagen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pelicula $pelicula)
    {
        $data['pelicula'] = $pelicula;
        return view('admin.imagen.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = public_path() . '/images/project';
        $fileName = uniqid() . $file->getClientOriginalName();

        $file->move($path, $fileName);
        $imagen = Imagen::create(['nombre'=>$fileName, 'pelicula_id'=>$request->pelicula_id]);
        echo "<script>javascript: alert('test msgbox')></script>";
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        $pelicula = $imagen->pelicula;
        $filename = $imagen->nombre;
        $path = public_path().'/images/project/'.$filename;
        File::delete($path);
        if($imagen){
            $imagen->delete();
            flash('Se ha eliminado '.$imagen->nombre.' correctamente.')->success();
        }else{
            flash('Error al eliminar, no existe el id '.$id.'.')->error();
        }
        return redirect()->route('imagen.index', $pelicula->id);
    }
}
