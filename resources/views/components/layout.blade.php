<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="{{asset('css/main.css')}}"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>Ledenadministratie</title>
    </head>
    <body>
        <div class="container-grid">
            <div class="container-grid-item">
                {{-- locatie flashmessage moet nog aangepast--}}
                <x-flash-message />
        <header><h1>
            <a href="/">Ledenadministratie</a> </h1>
            
        </header>
        </div>
        <div class="container-grid-item">
        <nav class="flex-menu">
            <ul class="menu">
                @auth
                <li>
                    <p>Welkom {{auth()->user()->name}}</p>
                </li>
                <li><a
                    href="/families/create"
                    >Familie aanmaken</a
                ></li>
                
                <li><a
                    href="/register"
                    >Admin account aanmaken</a
                ></li>
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
                @guest
                <li><a
                    href="/login"
                    >Admin inlog</a
                ></li> 
                @endguest
                <li>
                    @include('partials._search')
                </li>
            </ul>
        </nav>
        </div>
        <div class="container-grid-item">
        <main>
{{$slot}}
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
