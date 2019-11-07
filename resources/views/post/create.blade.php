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
            <label>
                <p>Titre de l'article</p>
                <input type="text" name="title" placeholder="Titre">
            </label>
            <label>
                <p>Contenu</p>
                <textarea name="content">

                </textarea>
            </label>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
@endsection
