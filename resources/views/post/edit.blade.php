@extends('layouts.app')

@section('tab-title')
    Modification de l'article {{$post->title}}
@endsection

@section('content')
    <div class="container">
        <h1>Modification de l'article {{$post->title}}</h1>

        <form method="POST" action="/posts/{{$post->slug}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" placeholder="Titre"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') ?? $post->title }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Quand souhaitez-vous publier cet article</p>
                <label for="published_at_date">Date</label>
                <input type="date" name="published_at_date" id="published_at_date"
                       class="form-control @error('published_at_date') is-invalid @enderror"
                       value="{{ old('published_at_date') ?? $post->published_at->format('Y-m-d') }}">
                @error('published_at_date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="published_at_time">Heures</label>
                <input type="time" name="published_at_time" id="published_at_time"
                       class="form-control @error('published_at_time') is-invalid @enderror"
                       value="{{ old('published_at_time') ?? $post->published_at->format('H:i') }}">
                @error('published_at_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea name="content" id="body"
                          class="form-control @error('content') is-invalid @enderror"
                >{{ old('content') ?? $post->content }}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection
