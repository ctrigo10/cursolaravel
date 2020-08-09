@extends('layouts.main')

@section('title','LISTA DE USUARIOS')

@section('content')
	@include('flash::message')
	<a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo Usuario</a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Accion</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@if($user->type == 'admin')
					<span class="label label-danger">administrador</span> 
				@else
					<span class="label label-warning">miembro</span>
				@endif
			</td>
			<td>
				<a href="{{ route('user.destroy', $user->id) }}" 
				   onclick="eliminarRegistro(event, this.href)" 
				   class="btn btn-danger btn-xs" title="Eliminar">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				<a href="{{ route('user.edit', $user->id) }}"
				   class="btn btn-success btn-xs" title="Editar">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
			</td>
		</tr>	
		@endforeach
	</table>
	{{ $users->links() }}
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