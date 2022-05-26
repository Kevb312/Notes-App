@extends('plantilla')

@section('title') Home @endsection
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>


@section('content')

	<div class="container" style="padding-top: 2rem;">
		<div class="card">
		  <div class="card-header">
		    <h5>Nueva nota</h5>
		  </div>
		  <div class="card-body">
			<form method="POST" action="{{route('NotasGuardar')}}"> 
				@csrf
			  <div class="form-group">
			    <label for="inputTitulo">Titulo</label>
			    <input type="text" class="form-control" id="Titulo" placeholder="Titulo de la nota" name="Titulo" required value="{{old('Titulo')}}">
			  </div>

			  <div class="form-group">
			    <label for="inputTextTarea">Nota...</label>
			    <textarea class="form-control" id="editor" rows="3" name="Nota"  value="{{old('Nota')}}"></textarea>
			  </div>

			  <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
			</form>
		  </div>
		</div>

		<div class="card" style="margin-top: 2rem;">
			<h5 class="card-header">Ultimas notas añadidas</h5>
			@forelse($notas as $notasItem)
			  <div class="card-body">
			    <h5 class="card-title"> {{$notasItem->name}} </h5>
			    
			    <a href="{{route('NotasView', $notasItem->id)}}" class="btn btn-success"> Ver / Editar </a>
			    <a href="{{route('NotasBorrar', $notasItem->id)}}" class="btn btn-primary">Borrar</a>
			  </div>
			@empty
				<div class="card-body">
					<h5 class="card-title">No hay notas para mostrar</h5>
				</div>
				

			@endforelse
		</div>
	</div>


<script>
	
    ClassicEditor
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection