@extends('layout')
@section('content')


<h3>Ajouter un espèce</h3>
<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group mb-3">
		<label>Nom de l'espèce</label>
		<input type="text" name="name" class="form-control" />
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection