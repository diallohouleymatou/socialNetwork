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
        .post {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @include('layouts.navbarhome')

    <div class="container mt-4">
        <h2>Derniers Posts</h2>

        <div class="post">
            <h5>Auteur 1</h5>
            <p>Ceci est un exemple de post sur le réseau social. Partagez vos pensées ici !</p>
            <small>Publié le 27 Octobre 2024</small>
        </div>

        <div class="post">
            <h5>Auteur 2</h5>
            <p>Un autre post intéressant. N'hésitez pas à réagir et à commenter !</p>
            <small>Publié le 26 Octobre 2024</small>
        </div>

        <div class="post">
            <h5>Auteur 3</h5>
            <p>Rejoignez-nous pour discuter de sujets qui vous passionnent !</p>
            <small>Publié le 25 Octobre 2024</small>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
