<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Importar clases del modelo
use App\User;
// Importar clase request de validacion
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listado de registros
        // $users = User::all();                           // Obtener todos los registros
        // $users = User::orderBy('id', 'DESC')->get();    // Obtener todos los registros ordenados
        $users = User::orderBy('id', 'DESC')->paginate(10); // Obtener los registros ordenados y paginados
        // Enviar listado de registros a una vista
        $data['users'] = $users;
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Renderizar formulario para nuevo registro
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(UserCreateRequest $request)
    {
        // Guardar datos del formulario
        // 1. Obtener todos los datos del formulario
        $user = new User($request->all());
        // 2. Cifrar password
        $user->password = bcrypt($user->password);
        // 3. Guardar en la base de datos
        $user->save();
        // 4. Mostrar mensaje
        //return 'Usuario registrado correctamente';
        flash('Usuario registrado correctamente')->success();
        // 5. Redireccionar a listado de usuarios
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar informacion detallada
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Renderizar formulario para editar
        $user = User::find($id);
        // dd($user);
        $data['user'] = $user;
        return view('admin.user.edit', $data);
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
        // Registrar cambios en la base de datos
        // dd($request->all());
        // 1. Buscar registro a modificar
        $user = User::find($id);
        // 2. Editar valores
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        // 3. Guardar cambios
        $user->save();
        // 4. Preparar mensaje
        flash('Usuario editado correctamente')->success();
        // 5. Redireccionar
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un registro
        // 1. Buscar registro a eliminar
        $user=User::find($id);
        if($user){
            // 2. Eliminar registro
            $user->delete();
            // 3. Preparar mensaje
            flash('Se ha eliminado '.$user->name.' correctamente.')->success();
        }else{
            // Preparar mensaje de error
            flash('Error al eliminar, no existe el id '.$id.'.')->error();
        }
        // 4. Redireccionar
        return redirect()->route('user.index');
    }
}
