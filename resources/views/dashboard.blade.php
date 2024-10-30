<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tableau de Bord - Mon Réseau Social</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            margin: 20px;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-4">
        <h2>Tableau de Bord</h2>

        <div class="row">
            <div class="col-md-4 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques</h5>
                        <p class="card-text">Voici quelques statistiques sur votre activité.</p>
                        <a href="#" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nouveaux Amis</h5>
                        <p class="card-text">Découvrez les nouveaux amis que vous pouvez ajouter.</p>
                        <a href="#" class="btn btn-primary">Ajouter des amis</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Messages</h5>
                        <p class="card-text">Consultez vos messages récents.</p>
                        <a href="#" class="btn btn-primary">Voir les messages</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil</h5>
                        <p class="card-text">Voir votre profil</p>
                        <a href="{{route('profile')}}" class="btn btn-primary">Profil</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
