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

        <div class="post">
            <div class="post-header">
                <h5>Auteur 1</h5>
                <small>Publié le 27 Octobre 2024</small>
            </div>
            <p>Ceci est un exemple de post sur le réseau social. Partagez vos pensées ici !</p>
            <button class="btn btn-link">J'aime</button>
            <button class="btn btn-link">Commenter</button>
        </div>

        <div class="post">
            <div class="post-header">
                <h5>Auteur 2</h5>
                <small>Publié le 26 Octobre 2024</small>
            </div>
            <p>Un autre post intéressant. N'hésitez pas à réagir et à commenter !</p>
            <button class="btn btn-link">J'aime</button>
            <button class="btn btn-link">Commenter</button>
        </div>

        <div class="post">
            <div class="post-header">
                <h5>Auteur 3</h5>
                <small>Publié le 25 Octobre 2024</small>
            </div>
            <p>Rejoignez-nous pour discuter de sujets qui vous passionnent !</p>
            <button class="btn btn-link">J'aime</button>
            <button class="btn btn-link">Commenter</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
