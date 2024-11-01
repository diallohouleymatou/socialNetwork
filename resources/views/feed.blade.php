<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Feed - Mon Réseau Social</title>
    <style>


        .post-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .post-button {
            margin-top: 15px;
        }

        body {
            background-color: #f8f9fa;
        }
        .post {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

    @include('layouts.navbar')
    <div class="container mt-4">
        <h2>Fil d'Actualités</h2>
        @include('publication')

        @foreach ($posts as $post)
        <div class="post">
            <h5>{{$post->user->prenom}}</h5>
            <p>{{ $post->texte }}</p>
            @if(!$post->likes->contains('user_id',auth()->user()->id))
                <form action="{{route('like',$post->id)}}" method="post">
                    @csrf
                    <button class="btn btn-like" type="submit">{{$post->likes->count()}}♡</button>
                </form>
            @else
                <form action="{{route('unlike',$post->id)}}" method="post">
                    @csrf
                    <button class="btn btn-like" type="submit">{{$post->likes->count()}}❤️</button>
                </form>
            @endif
            <button class="btn btn-comment" data-toggle="collapse" data-target="#commentSection{{ $post->id }}">💬 Commenter</button>

            <div id="commentSection{{ $post->id }}" class="collapse comment-section">
                <form action="" method="POST">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
