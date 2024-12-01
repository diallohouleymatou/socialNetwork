<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Feed - Mon Réseau Social</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
        }

        /* Post Container */
        .post-container {
            margin: 20px auto;
            padding: 20px;
            border-radius: 12px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .post-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .post-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .post-header h5 {
            margin: 0;
            font-weight: 600;
        }

        .post-header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .post-text {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            margin: 10px 0;
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .post-actions button {
            background: transparent;
            border: none;
            font-size: 16px;
            color: #007bff;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        .post-actions button:hover {
            color: #0056b3;
        }

        .likes-comments {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        /* Comment Section */
        .comment-section {
            margin-top: 20px;
        }

        .comment {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        .comment p {
            margin: 0;
            padding: 5px 0;
            color: #333;
        }

        .comment-meta {
            font-size: 12px;
            color: #777;
        }

        .comment-content {
            font-weight: bold;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .post-container {
                padding: 15px;
            }

            .post-header h5 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')
    <div class="container mt-4">
        <h2>Fil d'Actualités</h2>
        @include('publication')

        @foreach ($posts as $post)
        <div class="post-container">
            <div class="post-header">
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/default-profile-pic.jpg') }}" alt="{{ $post->user->prenom }}'s profile">
                    <a href="{{ route('profile', $post->user->id) }}" class="text-dark text-decoration-none">
                        <h5>{{ $post->user->prenom }}</h5>
                    </a>
                </div>
                <small>{{ $post->created_at->diffForHumans() }}</small>
            </div>

            <p class="post-text">{{ $post->texte }}</p>

            <div class="likes-comments">
                <span>{{ $post->likes->count() }} ❤️</span>
                <span class="ml-3">{{ $post->commentaires->count() }} 💬</span>
            </div>

            <div class="post-actions">
                @if(!$post->likes->contains('user_id', auth()->user()->id))
                    <form action="{{route('like', $post->id)}}" method="post">
                        @csrf
                        <button type="submit">J'aime</button>
                    </form>
                @else
                    <form action="{{route('unlike', $post->id)}}" method="post">
                        @csrf
                        <button type="submit">Je n'aime plus</button>
                    </form>
                @endif
                <button data-toggle="collapse" data-target="#commentSection{{ $post->id }}">💬 Commenter</button>
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
                            <span class="comment-content"><a href="{{Route('profile',$comment->user->id)}}">{{$comment->user->prenom }}:</a></span>
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
