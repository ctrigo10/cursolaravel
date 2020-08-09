@extends('layouts.main')

@section('title','EDITAR GÉNERO')

@section('content')
	{!! Form::open(['route'=>['genero.update', $genero], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('genero', 'Género:') !!}
			{!! Form::text('genero', $genero->genero, ['class' => 'form-control',
										  'placeholder' => 'Género',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</>
	{!! Form::close() !!}
@endsection