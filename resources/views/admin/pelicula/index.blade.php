@extends('layouts.main')

@section('title','LISTA DE PELICULAS')

@section('content')
	@include('flash::message')
	<a href="{{ route('pelicula.create') }}" class="btn btn-primary">Nueva Pelicula</a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Costo</th>
			<th>Resumen</th>
			<th>Estreno</th>
			<th>Usuario</th>
			<th>Género</th>
			<th>Directores</th>
			<th>Imágene(s)</th>
			<th>Accion</th>
		</tr>
		@foreach($peliculas as $pelicula)
		<tr>
			<td>{{ $pelicula->id }}</td>
			<td>{{ $pelicula->titulo }}</td>
			<td>{{ $pelicula->costo }}</td>
			<td>{{ $pelicula->resumen }}</td>
			<td>{{ $pelicula->estreno }}</td>
			<td>{{ $pelicula->user->name }}</td>
			<td>{{ $pelicula->genero->genero }}</td>
			<td>
				@foreach($pelicula->directores as $director)
					<li>{{ $director->nombre}}</li>
				@endforeach
			</td>
			<td>
				@foreach($pelicula->imagenes as $imagen)
					<img src={{URL::asset('Images/project/' . $imagen->nombre)}} height="40px" width="50px">
				@endforeach
			</td>
			<td>
				<a href="{{ route('pelicula.destroy', $pelicula->id) }}" 
				   onclick="eliminarRegistro(event, this.href)" 
				   class="btn btn-danger btn-xs" title="Eliminar">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				<a href="{{ route('pelicula.edit', $pelicula->id) }}"
				   class="btn btn-success btn-xs" title="Editar">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
				<a href="{{ route('imagen.index', $pelicula->id) }}"
				   class="btn btn-warning btn-xs" title="Imagenes">
					<span class="glyphicon glyphicon-picture"></span>
				</a>
			</td>
		</tr>	
		@endforeach
	</table>
	{{ $peliculas->links() }}
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