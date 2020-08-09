@extends('layouts.main')

@section('title','COMPONENTES BLADE')

@section('content')
	{{-- USO DE PHP EN BLADE --}}
	<?php
		$nombre = 'Pedro';
		$edad = 12;
	?>

	<h3>IMPRIMIR DATOS</h3>
	<p>Nombre : {{ $nombre }} </p>
	<p>Edad : {{ $edad }} </p>
	<p>Suma : {{ 3 + 4 }}</p>
	<p>Logica : {{ TRUE or FALSE }}</p>

	<h3>CONDICIONAL IF</h3>
	@if($edad >= 18)
		<p> {{ $nombre }} es mayor de edad</p>
	@else
		<p> {{ $nombre }} es menor de edad</p>	
	@endif

	<h2>CONDICIONAL SWITCH</h2>
	<?php $mes = 2; ?>
	@switch($mes)
		@case(1)
			<p>ENERO</p>
			@break
		@case(2)
			<p>FEBRERO</p>
			@break
		@case(3)
			<p>MARZO</p>
			@break
		@default
			<p>MES DESCONOCIDO</p>
	@endswitch

	<h2>BUCLE FOR</h2>
	<ul>
	@for($i=1; $i<=10; $i++)
		<li>{{ $i }}</li>
	@endfor
	</ul>

	<h2>BUCLE FOREACH</h2>
	@php 
		$nombres = array('Mateo', 'Marcos', 'Lucas', 'Juan'); 
	@endphp

	<ul>
	@foreach($nombres as $nombre)
		<li>{{ $nombre }}</li>
	@endforeach
	</ul>
@endsection