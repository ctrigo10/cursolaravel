@extends('layouts.main')

@section('title','NUEVA PELÍCULA')

@section('content')
	@include('layouts.error')
	{!! Form::open(['route'=>['pelicula.store',$pelicula->id]]) !!}
		<div class="form-group">
			{!! Form::label('titulo', 'Título:') !!}
			{!! Form::text('titulo', null, ['class' => 'form-control',
										  'placeholder' => 'Título',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('costo', 'Costo:') !!}
			{!! Form::text('costo', null, ['class' => 'form-control',
										  'placeholder' => 'Costo',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('resumen', 'Resumen:') !!}
			{!! Form::textarea('resumen', null, ['class' => 'form-control',
										  'placeholder' => 'Resumen',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('estreno', 'Estreno:') !!}
			{!! Form::date('estreno', null, ['class' => 'form-control',
										  'placeholder' => 'Estreno',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('user_id', 'Usuario:') !!}
			{!! Form::select('user_id', $usuarios, null, ['class' => 'form-control',
																			'placeholder' => 'Elija un usuario',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('genero_id', 'Género:') !!}
			{!! Form::select('genero_id', $generos, null, ['class' => 'form-control',
																			'placeholder' => 'Elija un género',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('director', 'Director:') !!}
			{!! Form::select('director[]', $directores, null, ['class' => 'form-control',
																			'placeholder' => 'Elija directores',
																			'multiple'=>'multiple',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection