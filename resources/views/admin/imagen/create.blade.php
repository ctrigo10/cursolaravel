@extends('layouts.main')

@section('title','NUEVAS IMAGENES')

@section('content')
	@include('layouts.error')
	{!! Form::open([ 'route' => [ 'imagen.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}

<div>

	<h3>Cargue aquí las imagenes</h3>
	{!! Form::hidden('pelicula_id', $pelicula->id, [
										  'required']) !!}

</div>

{!! Form::close() !!}
<br>
<h4><a href="{{ route('imagen.index', $pelicula->id) }}"><- Regresar para ver las imágenes</a></h4>
@endsection

@section('javascript')
<script>
	 Dropzone.options.imageUpload = {
		maxFilesize: 1,
		acceptedFiles: ".jpeg,.jpg,.png,.gif"
};

</script>
@endsection