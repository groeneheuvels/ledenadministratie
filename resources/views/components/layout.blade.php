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

        {{-- locatie flashmessage moet nog aangepast --}}
        <x-flash-message />
        <header>
            <h1>
                <a href="/">Ledenadministratie</a>
            </h1>

        </header>

        <div id="sidebar">
            <nav class="flex-menu">
                @include('partials._search')
                <ul class="menu">

                    @auth
                        <li>
                            <a href="/users/{{ auth()->user()->id }}/edit">Welkom {{ auth()->user()->name }}</a>
                        </li>
                        <li><a href="/families/create">Familie aanmaken</a></li>
                        <li><a href="/facturen">Facturen</a></li>
                        <li id="submenu-toggle">
                            <div>
                                Instellingen &gt;
                                <ul id="submenu">
                                    {{-- <li><a href="/users">Admin accounts bewerken</a></li> --}}
                                    <li><a href="/register">Admin account aanmaken</a></li>
                                    <li><a href="/lidsoorten">Lidsoorten</a></li>
                                    <li><a href="/leeftijdscategorieen">Leeftijdscategorieën</a></li>
                                    <li><a href="/boekjaren">Boekjaren</a></li>
                                </ul>
                            </div>
                        </li>

                    @endauth
                    @guest
                        <li><a href="/login">Admin inlog</a></li>
                    @endguest

                </ul>
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <div class="padding">
                            <button type="submit">
                                Uitloggen
                            </button>
                        </div>
                    </form>
                @endauth
            </nav>
        </div>

        <main>
            {{ $slot }}
        </main>


        <footer>
            <h1>footer</h1>
        </footer>

    </div>
</body>

</html>
