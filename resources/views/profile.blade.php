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
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-pic {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 4px solid #007bff;
            transition: transform 0.3s;
        }
        .profile-pic:hover {
            transform: scale(1.05);
        }
        .profile-info {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .profile-info h2 {
            margin-bottom: 15px;
            color: #343a40;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .btn-edit {
            margin-top: 10px;
        }
        .posts {
            margin-top: 30px;
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
        .likes-comments {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        .btn-like, .btn-comment {
            margin-right: 10px;
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
        .comment-meta {
            font-size: 12px;
            color: #666;
        }
        .comment-content {
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <header class="profile-header">
            <h1>Profil de <span id="username">{{ Auth::user()->prenom }}</span></h1>
            <img src="profile-pic.jpg" alt="Photo de Profil" class="profile-pic">
        </header>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="profile-info mb-4">
            <h2>Informations</h2>
            <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p><strong>Bio :</strong> {{ Auth::user()->bio }}</p>
            <p><strong>Localisation :</strong> Paris, France</p>
            <p><strong>Followers :</strong> {{ Auth::user()->followers->count() }}</p>
            <p><strong>Following :</strong> {{ Auth::user()->following->count() }}</p>
            <a href="{{ route('edit') }}" class="btn btn-secondary btn-edit">Modifier le Profil</a>
            <a href="{{route('edit_password')}}" class="btn btn-warning btn-edit">Changer le Mot de Passe</a>
        </section>

        <section class="posts mb-4">
            <h2>Mes Publications</h2>
            @if (auth::user()->publications)
                @foreach (auth::user()->publications as $post)
                    <div class="post">
                        <h3>{{$post->user->prenom}}</h3>
                        <p>{{ $post->texte }}</p>

                        <div class="likes-comments">
                            <span>{{ $post->likes->count() }} ❤️</span>
                            <span class="ml-3">{{ $post->commentaires->count() }} 💬</span>
                        </div>

                        <div class="post-actions">
                            @if(!$post->likes->contains('user_id', auth()->user()->id))
                                <form action="{{route('like', $post->id)}}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-link btn-like" type="submit">J'aime</button>
                                </form>
                            @else
                                <form action="{{route('unlike', $post->id)}}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-link btn-like" type="submit">Je n'aime plus</button>
                                </form>
                            @endif
                            <button class="btn btn-link btn-comment" data-toggle="collapse" data-target="#commentSection{{ $post->id }}">💬 Commenter</button>
                        </div>

                        <div id="commentSection{{ $post->id }}" class="collapse comment-section">
                            <form action="{{route('comments', $post->id)}}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="contenu" placeholder="Ajouter un commentaire" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            <div class="comment">
                                @foreach ($post->commentaires as $comment)
                                    <div>
                                        <span class="comment-content">{{ $comment->user->prenom }}:</span>
                                        <p>{{ $comment->contenu }}</p>
                                        <div class="comment-meta">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Vous n'avez rien publié</p>
            @endif
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
