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
            font-family: Arial, sans-serif;
        }
        .dashboard-card {
            margin: 20px 0;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-weight: bold;
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    header {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .navbar-nav .nav-link {
        font-size: 16px;
        transition: color 0.3s;
    }
    .navbar-nav .nav-link:hover {
        color: #f8f9fa;
        text-decoration: underline;
    }
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30' fill='white'%3E%3Cpath stroke='white' stroke-width='2' d='M5 7h20M5 15h20M5 23h20'/%3E%3C/svg%3E");
    }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-4">
        <h2 class="mb-4">Tableau de Bord</h2>

        <div class="row">
            <div class="col-md-4 dashboard-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques</h5>
                        <p class="card-text">Voici quelques statistiques sur votre activité.</p>
                        <a href="/stats" class="btn btn-primary">Voir les détails</a>
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
                        <a href="{{route('profile',auth()->user()->id)}}" class="btn btn-primary">Profil</a>
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
