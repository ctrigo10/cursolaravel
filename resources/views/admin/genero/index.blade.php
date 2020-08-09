@extends('layouts.main')

@section('title','LISTA DE GENEROS')

@section('content')
	@include('flash::message')
	<a href="{{ route('genero.create') }}" class="btn btn-primary">Nuevo Genero</a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Genero</th>
			<th>Accion</th>
		</tr>
		@foreach($generos as $genero)
		<tr>
			<td>{{ $genero->id }}</td>
			<td>{{ $genero->genero }}</td>
			<td>
				<a href="{{ route('genero.destroy', $genero->id) }}" 
				   onclick="eliminarRegistro(event, this.href)" 
				   class="btn btn-danger btn-xs" title="Eliminar">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				<a href="{{ route('genero.edit', $genero->id) }}"
				   class="btn btn-success btn-xs" title="Editar">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
			</td>
		</tr>	
		@endforeach
	</table>
	{{ $generos->links() }}
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