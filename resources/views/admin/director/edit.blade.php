@extends('layouts.main')

@section('title','EDITAR DIRECTOR')

@section('content')
	{!! Form::open(['route'=>['director.update', $director], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Director:') !!}
			{!! Form::text('nombre', $director->nombre, ['class' => 'form-control',
										  'placeholder' => 'Nombre de Director',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</>
	{!! Form::close() !!}
@endsection