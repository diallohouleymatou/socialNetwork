<header class="bg-primary text-white">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/feed">MonRéseau</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/feed">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Parametre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('deconnexion')}}">Déconnexion</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action ="{{route('search')}}" method ="POST">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche..." aria-label="Recherche" name="search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>


