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
        @component('components.main-navigation')
        @endcomponent
        <div>
            <h1>{{$post->title}}</h1>
            <p>
                <time datetime="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</time>
            </p>
            <p>
                Un post écrit par
                <a href="/users/{{$post->author_id}}/posts">
                    {{$post->author->name}}
                </a>
                @can('update', $post)
                    - <a href="/posts/{{$post->id}}/edit">Modifier</a>
                @endcan
            </p>
        </div>
        {{$post->content}}
        @can('delete', $post)
            <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <label>
                    <p>Supprimer cet article</p>
                    <button class="btn btn-danger">Supprimer</button>
                </label>
            </form>
        @endcan
    </div>
@endsection
