@extends('layouts.main')

@section('title','EDITAR USUARIO')

@section('content')
	{!! Form::open(['route'=>['user.update', $user], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre:') !!}
			{!! Form::text('name', $user->name, ['class' => 'form-control',
										  'placeholder' => 'Nombre del usuario',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo electronico:') !!}
			{!! Form::text('email', $user->email, ['class' => 'form-control',
										  'placeholder' => 'ejemplo@gmail.com',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Tipo de usuario:') !!}
			{!! Form::select('type', ['member'=>'Miembro', 'admin' => 'Administrador'], 
							 $user->type, ['class' => 'form-control',
									'placeholder' => 'Seleccione una opcion',
									'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection