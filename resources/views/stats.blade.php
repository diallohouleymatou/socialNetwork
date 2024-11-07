<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Statistiques - Mon Réseau Social</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .stats-card {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-4">
        <h2 class="mb-4">Statistiques</h2>

        <div class="row">
            <div class="col-md-3 stats-card">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Publications</h5>
                        <p class="card-text">{{ $totalPosts }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 stats-card">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Likes</h5>
                        <p class="card-text">{{ $totalLikes }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 stats-card">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Commentaires</h5>
                        <p class="card-text">{{ $totalComments }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 stats-card">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Followers</h5>
                        <p class="card-text">{{ $totalFollowers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
