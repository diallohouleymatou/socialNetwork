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
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .profile-pic {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 4px solid #007bff;
        }
        .post {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f1f1f1;
            transition: background-color 0.3s;
        }
        .post:hover {
            background-color: #e9ecef;
        }
        h1, h2 {
            color: #343a40;
        }
        .btn-like {
            color: #007bff;
        }
        .btn-comment {
            color: #28a745;
        }
        .comment-section {
            margin-top: 10px;
        }
        .comment {
            margin-top: 5px;
            padding: 5px;
            background-color: #ffffff;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
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
            @if (auth::user()->publications)
                @foreach (auth::user()->publications as $post)
                    <div class="post">
                        <p>{{ $post->texte }}</p>
                        <button class="btn btn-like">❤️ J'aime</button>
                        <button class="btn btn-comment" data-toggle="collapse" data-target="#commentSection{{ $post->id }}">💬 Commenter</button>

                        <div id="commentSection{{ $post->id }}" class="collapse comment-section">
                            <form action="{{}}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="comment" placeholder="Ajouter un commentaire" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                                <div class="comment"></div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Vous n'avez rien publié</p>
            @endif
        </section>
    </div>
</body>
</html>
