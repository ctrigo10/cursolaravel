@extends('layouts.main')

@section('title','LISTA DE DIRECTORES')

@section('content')
	@include('flash::message')
	<a href="{{ route('director.create') }}" class="btn btn-primary">Nuevo Director</a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Director</th>
			<th>Accion</th>
		</tr>
		@foreach($directores as $director)
		<tr>
			<td>{{ $director->id }}</td>
			<td>{{ $director->nombre }}</td>
			<td>
				<a href="{{ route('director.destroy', $director->id) }}" 
				   onclick="eliminarRegistro(event, this.href)" 
				   class="btn btn-danger btn-xs" title="Eliminar">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				<a href="{{ route('director.edit', $director->id) }}"
				   class="btn btn-success btn-xs" title="Editar">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
			</td>
		</tr>	
		@endforeach
	</table>
	{{ $directores->links() }}
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