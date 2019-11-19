@extends('layouts.app')

@section('tab-title')
    Création d'un nouvel article
@endsection

@section('content')
    <div class="container">
        <h1>Création d'un nouvel article</h1>
        <form method="post" action="/posts">
            @csrf
            <div class="form-group">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" placeholder="Titre"
                       class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Quand souhaitez-vous publier cet article</p>
                <label for="published_at_date">Date</label>
                <input type="date" name="published_at_date" id="published_at_date"
                       class="form-control @error('published_at_date') is-invalid @enderror"
                        value="{{ old('published_at_date') }}">
                @error('published_at_date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="published_at_time">Heures</label>
                <input type="time" name="published_at_time" id="published_at_time"
                       class="form-control @error('published_at_time') is-invalid @enderror"
                       value="{{ old('published_at_time') }}">
                @error('published_at_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea name="content" id="body"
                          class="form-control @error('content') is-invalid @enderror"
                >{{old('content')}}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection
