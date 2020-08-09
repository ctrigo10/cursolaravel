@extends('layouts.main')

@section('title','MENU PRINCIPAL')

@section('content')
	<a href="{{ url('/hola/ruta') }}">1. Hola Routes.php</a> </br>
	<a href="{{ url('/saludo/dia') }}">2. Grupos de rutas - saludo dia</a> </br>
	<a href="{{ route('practica3') }}">3. Grupos de rutas - saludo tarde</a> </br>
	{!! link_to_route('practica4', $title='4. Grupos de rutas - saludo noche') !!} </br>
	<a href="{{ route('practica5') }}">5. Hola desde el controlador</a> </br>
	<a href="{{ route('practica6', ['nombre'=>'Ana', 'edad'=>45]) }}">6. Paso de parametros</a> </br>
	
@endsection