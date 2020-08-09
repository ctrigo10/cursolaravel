<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index() {
    	return 'Hola desde PruebaController.php';
    }

    public function parametrosAction($nombre, $edad){
    	$out='Nombre: '.$nombre.'</br>';
    	$out.='Edad : '.$edad;
    	return $out;
    }

    public function vistaAction(){
    	return view('prueba.saludo_view');
    }

    public function datosAction($nombre, $edad){
    	// ENVIAR DATOS 1
    	/*
    	return view('prueba.datos_view')
    		->with('nombre',$nombre)
    		->with('edad',$edad);
    	*/
    	// ENVIAR DATOS 2
    	/*
    	$data['nombre'] = $nombre;
    	$data['edad'] = $edad;	
    	return view('prueba.datos_view', $data);
    	*/
    	// ENVIAR DATOS 3
    	$data = compact('nombre','edad');
    	return view('prueba.datos_view', $data);    	    	
    }

    public function bladeAction(){
    	return view('prueba.blade_view');	
    }
}
