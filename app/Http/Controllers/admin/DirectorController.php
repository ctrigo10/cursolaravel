<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Director;
use App\Http\Requests\DirectorCreateRequest;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directores = Director::orderBy('id', 'DESC')->paginate(10);
        $data['directores'] = $directores;
        return view('admin.director.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectorCreateRequest $request)
    {
        $director = new Director($request->all());
        $director->save();
        flash('Director registrado correctamente')->success();
        return redirect()->route('director.index');
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
        $director = Director::find($id);
        $data['director'] = $director;
        return view('admin.director.edit', $data);
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
        $director = Director::find($id);
        $director->update($request->toArray());
        flash('Director editado correctamente')->success();
        return redirect()->route('director.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director=Director::find($id);
        if($director){
            $director->delete();
            flash('Se ha eliminado '.$director->name.' correctamente.')->success();
        }else{
            flash('Error al eliminar, no existe el id '.$id.'.')->error();
        }
        return redirect()->route('director.index');
    }
}
