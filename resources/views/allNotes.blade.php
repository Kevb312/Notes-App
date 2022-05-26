@extends('plantilla')
@section('title') Todas las notas @endsection


@section('content')

	<div class="container">
		@forelse($notas as $notasItem)
			<div class="card" style="margin-top: 2rem;">
				<h5 class="card-header">{{$notasItem->name}}</h5>
				
				  <div class="card-body">
				    
				    <a href="{{route('NotasView', $notasItem->id)}}" class="btn btn-success"> Ver / Editar </a>
				    <a href="{{route('NotasBorrar', $notasItem->id)}}" class="btn btn-primary">Borrar</a>
				  </div>
			</div>
		@empty
			<div class="card-body">
				<h5 class="card-title">No hay notas para mostrar</h5>
			</div>
		@endforelse
		
	</div>
@endsection