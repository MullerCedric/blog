@extends('layouts.app')

@section('tab-title')
    Modification de l'article {{$post->title}}
@endsection

@section('content')
    <div class="container">
        @component('components.main-navigation')
        @endcomponent
        <h1>Modification de l'article {{$post->title}}</h1>
        <form method="POST" action="/posts/{{$post->id}}">
            @csrf
            @method('PUT')
            <label>
                <p>Titre de l'article</p>
                <input type="text" name="title" placeholder="Titre" value="{{$post->title}}">
            </label>
            <label>
                <p>Contenu</p>
                <textarea name="content">
                    {{$post->content}}
                </textarea>
            </label>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
@endsection
