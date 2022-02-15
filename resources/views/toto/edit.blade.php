@extends('layout')
@section('content')
<form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group mb-3">
		<label>Titre</label>
		<input type="text" name="title" class="form-control" value="{{$post->title}}" />
	</div>
	<div class="form-group mb-3">
    <label>Espèce :</label>
    <select class="form-control" name="category_id">
			@foreach($categories as $item)
      <option {{ ($item->id) == ($post->category_id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
			
			@endforeach
    </select>
	</div>
	{{-- <p>{{$category->id }}</p> --}}
	<div class="form-group mb-3">
		<label>Image</label>
		<input type="file" name="image" class="form-control" />
		<img src="/images/{{$post->image}}" width="100px">
	</div>
	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection