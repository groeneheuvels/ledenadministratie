<x-layout>
    <h2>Facturen</h2>
    @auth
        <div class="kaart-container">
            @unless (count($facturen) == 0)
                @foreach ($facturen as $factuur)
                    <div>
                        <x-factuur-kaart :factuur=$factuur />
                    </div>
                @endforeach
            @else
                <p>Geen facturen gevonden</p>
            @endunless
            <div class="knop">
                <a href="/facturen/create">factuur aanmaken</a>
            </div>
        </div>
    @endauth
</x-layout>
