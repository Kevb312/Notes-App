@extends('plantilla')

@section('title') Nota - {{$nota->name}}@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

@section('content')

	<div class="container" style="padding-top: 2rem;">
		<div class="card">
		  <div class="card-header">
		    <h5>Editar nota</h5>
		  </div>
		  <div class="card-body">
			<form method="POST" action="{{route('NotasUpdate', $nota->id)}}"> 
				@csrf

		
			  <div class="form-group">
			    <label for="inputTitulo">Titulo</label>
			    <input type="text" class="form-control" id="Titulo" placeholder="Titulo de la nota" name="Titulo" required value="{{$nota->name}}">
			  </div>
  			  <div class="form-group">
			    <label for="inputTitulo">Creado hace {{$nota->created_at->diffForHumans() }}</label>
			  </div>

			  <div class="form-group">
			    <label for="inputTextTarea">Nota...</label>
			    <textarea class="form-control" id="editor" rows="3" name="Nota"  >{{$nota->note}}
			    </textarea>
			  </div>

			  <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
				<a href="/"><button class="btn btn-danger">Cancelar</button></a>
			</form>
		  </div>
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