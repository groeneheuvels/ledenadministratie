<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Ledenadministratie</title>
</head>

<body>
    <div class="container-grid">
        <div class="container-grid-item">
            {{-- locatie flashmessage moet nog aangepast --}}
            <x-flash-message />
            <header>
                <h1>
                    <a href="/">Ledenadministratie</a>
                </h1>

            </header>
        </div>
        <div class="container-grid-item">
            <nav class="flex-menu">
                <ul class="menu">
                    @auth
                        <li>
                            <a href="/users/{{ auth()->user()->id }}/edit">Welkom {{ auth()->user()->name }}</a>
                        </li>
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <div class="knop">
                                    <button type="submit">
                                        Uitloggen
                                    </button>
                                </div>
                            </form>
                        </li>
                    @endauth
                    <li>
                        @include('partials._search')
                    </li>
                    @auth
                        <li><a href="/families/create">Familie aanmaken</a></li>
                        <li><a href="/register">Admin account aanmaken</a></li>
                        <li id="submenu-toggle">
                            <div>
                                Instellingen &gt;
                                <ul id="submenu">
                                    {{-- <li><a href="/users">Admin accounts bewerken</a></li> --}}
                                    <li><a href="/lidsoorten">Lidsoorten</a></li>
                                    <li><a href="/leeftijdscategorieen">Leeftijdscategorieën</a></li>
                                    <li><a href="/">Boekjaren</a></li>
                                </ul>
                            </div>
                        </li>
                    @endauth
                    @guest
                        <li><a href="/login">Admin inlog</a></li>
                    @endguest

                </ul>
            </nav>
        </div>
        <div class="container-grid-item">
            <main>
                {{ $slot }}
            </main>
        </div>
        <div class="container-grid-item">
            <footer>
                <h1>footer</h1>
            </footer>
        </div>
    </div>
</body>

</html>
