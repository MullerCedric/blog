@extends('layouts.app')

@section('tab-title')
    Création d'un nouvel article
@endsection

@section('content')
    <div class="container">
        @component('components.main-navigation')
        @endcomponent
        <h1>Création d'un nouvel article</h1>
        <form method="POST" action="/posts">
            @csrf
            <div class="form-group">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" placeholder="Titre" class="form-control">
            </div>
            <div class="form-group">
                <p>Quand souhaitez-vous publier cet article</p>
                <label for="published_at_date">Date</label>
                <input type="date" name="published_at_date" id="published_at_date" class="form-control">
                <label for="published_at_time">Heures</label>
                <input type="time" name="published_at_time" id="published_at_time" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea name="content" id="body" class="form-control">
                </textarea>
            </div>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection
