@extends('layouts.main')

@section('title','LISTA DE IMAGENES')

@section('content')
	@include('flash::message')
	<a href="{{ route('imagen.create',$pelicula->id) }}" class="btn btn-primary">Cargar imagenes</a>
	<div>
		<h2>{{ $pelicula->titulo }}</h2>
	</div>
	@foreach($pelicula->imagenes as $imagen)
	<img src={{URL::asset('Images/project/' . $imagen->nombre)}} height="200px" width="250px">
	
	<a href="{{ route('imagen.destroy', $imagen->id) }}" 
		onclick="eliminarRegistro(event, this.href)" 
		class="btn btn-danger btn-xs" title="Eliminar">
		<span class="glyphicon glyphicon-trash"></span>
	</a>
	@endforeach
@endsection

@section('javascript')
	<script>
		function eliminarRegistro(event, url){
			event.preventDefault();
			if(confirm("Esta seguro de eliminar el registro?")){
				window.location.href = url;
			}
		}
	</script>
@endsection