<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Accueil - Mon Réseau Social</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .post-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .post-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .post-header h5 {
            margin: 0;
        }
        .post-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        .post-actions button {
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        .likes-comments {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        .comment-section {
            margin-top: 15px;
        }
        .comment {
            margin-top: 10px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .comment p {
            margin: 0;
            padding: 5px 0;
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
    @include('layouts.navbarhome')

    <div class="container mt-4">
        <h2>Derniers Posts</h2>
        @foreach ($posts as $post)
        <div class="post-container">
            <div class="post-header">
                <h5>{{$post->user->prenom}}</h5>
                <small>{{ $post->created_at->diffForHumans() }}</small>
            </div>
            <p>{{ $post->texte }}</p>

            <div class="likes-comments">
                <span>{{ $post->likes->count() }} ❤️</span>
                <span class="ml-3">{{ $post->commentaires->count() }} 💬</span>
            </div>

            <div class="post-actions">
                    <form action="{{route('like', $post->id)}}" method="post">
                        @csrf
                        <button class="btn btn-link" type="submit">J'aime</button>
                    </form>
                <button class="btn btn-link" data-toggle="collapse" data-target="#commentSection{{ $post->id }}">💬 Commenter</button>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
