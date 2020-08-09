@extends('layouts.main')

@section('title','NUEVO DIRECTOR')

@section('content')
	@include('layouts.error')
	{!! Form::open(['route'=>'director.store']) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre:') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control',
										  'placeholder' => 'Nombre de director',
										  'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection