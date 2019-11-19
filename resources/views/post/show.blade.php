@extends('../layouts.app')

@section('description')
    <meta name="description"
          content="Articles de C'est bon pour ce que tu as">
@endsection

@section('tab-title')
    Articles
@endsection

@section('content')
    <div class="container">
        <div>
            <h1>{{$post->title}}</h1>
            <p>
                <time datetime="{{$post->published_at}}">{{$post->published_at->diffForHumans()}}</time>
            </p>
            <p>
                Un post écrit par
                <a href="/users/{{$post->author_id}}/posts">
                    {{$post->author->name}}
                </a>
                @can('update', $post)
                    - <a href="/posts/{{$post->slug}}/edit">Modifier</a>
                @endcan
            </p>
        </div>
        {{$post->content}}
        @can('delete', $post)
            <form action="/posts/{{$post->slug}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label class="sr-only" for="delete">
                        Supprimer cet article
                    </label>
                    <button class="btn btn-danger" id="delete">Supprimer</button>
                </div>
            </form>
        @endcan
        <section>
            <h2>Commentaires</h2>
            @if($post->comments && !$post->comments->isEmpty())
                <ul class="list-group list-group-flush">
                    @foreach($post->comments as $key => $comment)
                        <li class="list-group-item">
                            <p>Commentaire par {{$comment->author->name}}</p>
                            {{$comment->content}}

                            @can('delete', $comment)
                                <form action="/comments/{{$comment->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <label class="sr-only" for="delete-comment-{{$key}}">
                                        Supprimer ce commentaire
                                    </label>
                                    <button class="btn btn-sm btn-danger" id="delete-comment-{{$key}}">
                                        Supprimer
                                    </button>
                                </form>
                            @endcan
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucun commentaire sur cet article actuellement</p>
                @auth
                    <hr>
                @endauth
            @endif
            @auth
                <form action="{{route('comments.store', $post->slug)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="content">
                            Votre commentaire
                        </label>
                        <textarea name="content" id="content"
                                  class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="sr-only">
                            Ajouter ce commentaire
                        </label>
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                    </div>
                </form>
            @endauth
        </section>
    </div>
@endsection
