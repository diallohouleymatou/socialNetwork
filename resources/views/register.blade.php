<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Inscription</title>
</head>
<body>
    @session('error')
    <span>{{session('error')}}</span>
    @endsession
    <div class="container">
        <h2 class="mt-5">Inscription</h2>
        <form method ="POST" action ="{{route('register')}}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name ="nom" required>
                @error('nom')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name ="prenom" required>
                @error('prenom')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="Choisissez un nom d'utilisateur" name ="username" required>
                @error('username')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name ="email" required>
                @error('email')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez un mot de passe" name ="password" required>
                @error('password')
                <span>{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
        <p class="mt-3">Déjà inscrit ? <a href="/login">Connectez-vous ici</a>.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
