@extends('../layouts.app')

@section('tab-title')
    Articles
@endsection

@section('content')
    <div class="container">
        @component('components.main-navigation')
        @endcomponent
        @if(isset($user) AND $user)
            <h1>C'est bon pour ce que tu as - Les articles de {{ $user->name  }} ({{ $posts->total() }})</h1>
        @else
            <h1>C'est bon pour ce que tu as - Les articles ({{ $posts->total() }})</h1>
        @endif
        <div>
            @foreach($posts as $post)
                <article>
                    <div>
                        <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                        @can('update', $post)
                            <a href="/posts/{{$post->id}}/edit">Modifier</a>
                        @endcan
                    </div>
                    <div>{{$post->content}}</div>
                    <div>
                        <p>@if(!isset($user) OR !$user )
                                Un post écrit par
                                <a href="/users/{{$post->author_id}}/posts">
                                    {{$post->author->name}}
                                </a>,
                            @endif
                            <time datetime="{{$post->published_at}}">
                                {{$post->published_at->diffForHumans()}}
                            </time>
                            * {{ $post->comments->count() }} {{$post->comments->count() > 1 ? 'commentaires' : 'commentaire'}}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
@endsection
