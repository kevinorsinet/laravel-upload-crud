@extends('layout')
@section('content')
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group mb-3">
		<label>Titre</label>
		<input type="text" name="title" class="form-control" />
	</div>

	<div class="form-group mb-3">
		<label>Image</label>
		<input type="file" name="image" class="form-control" />
	</div>

	<div class="form-group mb-3">
    <label >Race :</label>
    <select class="form-control" name="category_id">
			@foreach($categories as $item)
      <option value="{{$item->id}}">{{$item->name}}</option>
			@endforeach
    </select>
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection