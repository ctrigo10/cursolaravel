@extends('layouts.main')

@section('title','NUEVO GÉNERO')

@section('content')
	@include('layouts.error')
	{!! Form::open(['route'=>'genero.store']) !!}
		<div class="form-group">
			{!! Form::label('genero', 'Género:') !!}
			{!! Form::text('genero', null, ['class' => 'form-control',
										  'placeholder' => 'Género',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection