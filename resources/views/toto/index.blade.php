@extends('layout')
@section('content')
		@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h2 class="pb-md-4">Liste des animaux</h2>
      
      <h2 class="pb-md-4"><a href="{{route('categories.index')}}">Liste des espèces</a></h2>
      <a class="btn btn-primary" href="{{route('posts.create')}}" role="button">Ajouter un animal</a>
    </div>
      <div class="row">

        @foreach($postsList as $item)
      
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
      </div>
      <div class="row">
        {!! $postsList->links() !!}
      </div>
        
        
      
 

@endsection