@extends('layout')
@section('content')


<h3>Modifier {{ $category->name }}</h3>
<form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group mb-3">
		<label>Nom de l'espèce</label>
		<input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a href="{{route('categories.index')}}">Retour</a>
	</div>
</form>
@endsection