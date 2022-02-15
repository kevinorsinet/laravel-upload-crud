@extends('layout')
@section('content')
		@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
		<div class="row">

      @foreach($postsList as $item)
			{{++$i}}
      <div class="card mr-4" style="width: 15rem;">
        <img class="card-img-top p-3" src="images/{{$item->image}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->title}}</h5>
          <p>{{$item->category->name}}</p>
					<a href="{{route('posts.edit', $item->id)}}">Editer</a>
					<form action="{{ route('posts.destroy', $item->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
      @endforeach
			{!! $postsList->links() !!}
    </div>
@endsection