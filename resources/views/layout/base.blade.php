<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Système d'authentification</title>
</head>

<body>
    <nav>
        <ul>
            @if (Auth::check())
                <li>
                    <a href="{{ route('profile') }}">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        Déconnexion
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        Connexion
                    </a>
                </li>
                <li>
                    <a href="{{ route('registration') }}">
                        Inscription
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>

</html>
