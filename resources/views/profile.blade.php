<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin-top: 30px;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid #007bff;
        }

        .profile-header .info {
            flex: 1;
            padding-left: 20px;
        }

        .profile-header .info h1 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-header .info p {
            font-size: 16px;
            color: #777;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-follow {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .btn-follow:hover {
            background-color: #0056b3;
        }

        .profile-info {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .profile-info .stat {
            text-align: center;
        }

        .profile-info .stat h3 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .profile-info .stat p {
            font-size: 14px;
            color: #777;
        }

        .posts {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .post-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: calc(33% - 20px);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .post-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .post-card img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-card .card-body {
            padding: 15px;
        }

        .post-card .card-body h5 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .post-card .card-body p {
            font-size: 14px;
            color: #555;
        }

        .likes-comments {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .likes-comments span {
            font-size: 14px;
            color: #555;
        }

        .likes-comments .btn-like {
            background-color: transparent;
            border: none;
            color: #007bff;
        }

        .likes-comments .btn-like:hover {
            color: #0056b3;
        }

        /* Media queries */
        @media (max-width: 991px) {
            .post-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .post-card {
                width: 100%;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header .info {
                padding-left: 0;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="container">
        <header class="profile-header">
            <div>
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default-profile-pic.jpg') }}" alt="Photo de Profil">
            </div>
            <div class="info">
                <h1>{{ $user->prenom }} {{ $user->nom }}</h1>
                <p>{{"@". $user->username }}</p>
                <p><strong>{{ $user->followers->count() }}</strong> abonnés | <strong>{{ $user->following->count() }}</strong> abonnements</p>

                @if(auth()->user()->id === $user->id)
                    <a href="{{ route('edit') }}" class="btn btn-edit">Modifier le Profil</a>
                @else
                    @if(Auth::user()->following->contains($user->id))
                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-follow">Se Désabonner</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-follow">Suivre</button>
                        </form>
                    @endif
                @endif
            </div>
        </header>

        <section class="profile-info">
            <div class="stat">
                <h3>{{ $user->publications->count() }}</h3>
                <p>Publications</p>
            </div>
            <div class="stat">
                <h3>{{ $user->followers->count() }}</h3>
                <p>Abonnés</p>
            </div>
            <div class="stat">
                <h3>{{ $user->following->count() }}</h3>
                <p>Abonnements</p>
            </div>
        </section>

        <section class="posts">
            <h2>Publications de {{ $user->prenom }}</h2>
            @if($user->publications->count() > 0)
                @foreach($user->publications as $post)
                    <div class="post-card">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                        @endif
                        <div class="card-body">
                            <h5>{{ $post->user->prenom }}</h5>
                            <p>{{ $post->texte }}</p>
                            <div class="likes-comments">
                                <span>{{ $post->likes->count() }} ❤️</span>
                                <span>{{ $post->commentaires->count() }} 💬</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>{{ $user->prenom }} n'a encore rien publié.</p>
            @endif
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
