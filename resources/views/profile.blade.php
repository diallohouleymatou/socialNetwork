<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .profile-pic {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 3px solid #007bff;
        }
        .post {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f1f1f1;
        }
        h1, h2 {
            color: #343a40;
        }
        button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1>Profil de <span id="username">{{ Auth::user()->prenom }}</span></h1>
        </header>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="profile-info mb-4">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="profile-pic.jpg" alt="Photo de Profil" class="profile-pic">
                </div>
                <div class="col-md-9">
                    <h2>Informations</h2>
                    <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Bio :</strong> {{ Auth::user()->bio }}</p>
                    <p><strong>Localisation :</strong> Paris, France</p>
                    <p><strong>Followers :</strong> {{ Auth::user()->followers->count() }}</p>
                    <p><strong>Following :</strong> {{ Auth::user()->following->count() }}</p>
                    <a href="{{ route('edit') }}" class="btn btn-secondary">Modifier le Profil</a>
                    <a href="{{route('edit_password')}}" class="btn btn-warning">Changer le Mot de Passe</a>
                </div>
            </div>
        </section>

        <section class="posts mb-4">
            <h2>Mes Publications</h2>
            <div class="post">
                <p>Ceci est ma première publication !</p>
            </div>
            <div class="post">
                <p>Aujourd'hui, j'ai appris à utiliser Bootstrap pour créer des pages web.</p>
            </div>
            <div class="post">
                <p>Excité pour mon prochain projet de développement web !</p>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Quoi de neuf ?" rows="3"></textarea>
            </div>
            <button class="btn btn-primary">Ajouter Publication</button>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
