<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil</title>
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
    </style>
</head>
<body>
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <h1>Modifier le Profil</h1>
        <form method="POST" action="{{ route('edit') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="editUsername">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ old('nom', Auth::user()->nom) }}">
            </div>

            <div class="form-group">
                <label for="editUsername">Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username', Auth::user()->username) }}">
            </div>

            <div class="form-group">
                <label for="editUsername">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{ old('prenom', Auth::user()->prenom) }}">
            </div>

            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}">
            </div>

            <div class="form-group">
                <label for="editBio">Bio</label>
                <textarea class="form-control" name="bio">{{ old('bio', Auth::user()->bio) }}</textarea>
            </div>

            <div class="form-group">
                <label for="profile_picture">Changer la photo de profil</label>
                <input type="file" class="form-control-file" name="profile_picture">
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
