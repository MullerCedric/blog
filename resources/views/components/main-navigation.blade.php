<div role="navigation">
    <a href="/">Accueil</a> -
    <a href="/contact">Contact</a> -
    <a href="/about">À propos</a>
    @auth
        - <a href="/posts/create">Ajouter un article</a>
    @endauth
    @guest
        - <a href="/login">Se connecter</a>
    @endguest
</div>
