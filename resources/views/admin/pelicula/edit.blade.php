@extends('layouts.main')

@section('title','EDITAR PELÍCULA')

@section('content')
	{!! Form::open(['route'=>['pelicula.update', $pelicula], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('titulo', 'Título:') !!}
			{!! Form::text('titulo', $pelicula->titulo, ['class' => 'form-control',
														'placeholder' => 'Título',
														'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('costo', 'Costo:') !!}
			{!! Form::text('costo', $pelicula->costo, ['class' => 'form-control',
										  'placeholder' => 'Costo',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('resumen', 'Resumen:') !!}
			{!! Form::textarea('resumen', $pelicula->resumen, ['class' => 'form-control',
										  'placeholder' => 'Resumen',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('estreno', 'Estreno:') !!}
			{!! Form::date('estreno', $pelicula->estreno, ['class' => 'form-control',
										  'placeholder' => 'Estreno',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('user_id', 'Usuario:') !!}
			{!! Form::select('user_id', $usuarios, $pelicula->user_id, ['class' => 'form-control',
																			'placeholder' => 'Elija un usuario',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('genero_id', 'Género:') !!}
			{!! Form::select('genero_id', $generos, $pelicula->genero_id, ['class' => 'form-control',
																			'placeholder' => 'Elija un género',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('director', 'Director:') !!}
			{!! Form::select('director[]', $directores, $pelicula->directores->pluck('id'), ['class' => 'form-control',
																			'placeholder' => 'Elija directores',
																			'multiple'=>'multiple',
																			'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</>
	{!! Form::close() !!}
@endsection