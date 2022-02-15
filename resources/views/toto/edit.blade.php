@extends('layout')
@section('content')
<form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group mb-3">
		<label>Titre</label>
		<input type="text" name="title" class="form-control" value="{{$post->title}}" />
	</div>
	<p>{{$category}}</p>
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