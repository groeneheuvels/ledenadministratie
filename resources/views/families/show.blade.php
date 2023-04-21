<x-layout>
    <h2>Familie</h2>
    <div class="kaart-container">
        <div class="kaart">
            <x-familie-kaart :familie="$familie" />
            @auth
                <div class="options">
                    <a class="knop" href="/familieleden/create?familie_id={{ $familie->id }}">Nieuw familielid
                        toevoegen</a>
                    <a class="knop" href="/families/{{ $familie->id }}/edit">Bewerk Familie {{ $familie->lastname }}</a>
                    <form method="POST" action="/families/{{ $familie->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger">
                            Delete Familie {{ $familie->lastname }}
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>




</x-layout>
