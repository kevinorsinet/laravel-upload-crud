@extends('layout')
@section('content')

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

  <h2 class="pb-md-4"><a href="{{route('posts.index')}}">Liste d'animaux</a></h2>
  <a class="btn btn-primary" href="{{route('posts.create')}}" role="button">Ajouter un animal</a>
  <a class="btn btn-primary" href="{{route('categories.create')}}" role="button">Ajouter une espèce</a>

</div>
<div class="container py-5">
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-12">
        <div class="tab-content">
          <div id="nav-tab-card" class="tab-pane fade show active">
            <h3>Liste des espèces</h3>
            @if(session()->get('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}  
            </div><br />
            @endif
            <!-- Tableau -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
									<th scope="col">Action</th>
                </tr>
              </thead>
                <tbody>
                @foreach($categoriesList as $category)
                  <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>

                  <td>
                    <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm">Editer</a>
                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST" style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>

                  </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Fin du Tableau -->
          </div>
      </div>
    </div>
  </div>
</div>


@endsection