<style>
    /* Navbar Styles */
    header {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar {
        background-color: #007bff;
    }

    .navbar-nav .nav-link {
        font-size: 16px;
        font-weight: 500;
        color: #f8f9fa;
        transition: color 0.3s, transform 0.3s;
    }

    .navbar-nav .nav-link:hover {
        color: #f8f9fa;
        text-decoration: underline;
        transform: scale(1.1);
    }

    .navbar-nav .nav-link.active {
        color: #ffcc00;
        font-weight: bold;
    }

    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30' fill='white'%3E%3Cpath stroke='white' stroke-width='2' d='M5 7h20M5 15h20M5 23h20'/%3E%3C/svg%3E");
    }

    /* Search Bar */
    .form-inline {
        display: flex;
        align-items: center;
    }

    .form-inline .form-control {
        border-radius: 20px;
        border: 1px solid #ffffff;
        padding: 8px 15px;
    }

    .form-inline .btn-outline-light {
        border-radius: 20px;
        border-color: #ffffff;
        color: #ffffff;
        font-weight: 600;
    }

    .form-inline .btn-outline-light:hover {
        color: #007bff;
        background-color: #ffffff;
        border-color: #007bff;
    }

    /* Responsive Navbar */
    @media (max-width: 991px) {
        .navbar-nav {
            text-align: center;
        }

        .form-inline {
            margin-top: 10px;
        }
    }
</style>

<header class="bg-primary text-white">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/feed" style="font-size: 24px; font-weight: 700; color: #fff;">MonRéseau</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/feed" id="home-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard" id="settings-link">Paramètres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('deconnexion')}}">Déconnexion</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="POST">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche..." aria-label="Recherche" name="search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>

<script>
    // Set active class based on current route (optional, depending on your needs)
    const currentPath = window.location.pathname;
    if (currentPath.includes("/feed")) {
        document.getElementById('home-link').classList.add('active');
    } else if (currentPath.includes("/dashboard")) {
        document.getElementById('settings-link').classList.add('active');
    }
</script>
