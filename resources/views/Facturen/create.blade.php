<x-layout>
    <h2>Factuur aanmaken</h2>
    <div class="create-formulier">
        <form method="POST" action="/facturen">
            @csrf
            <div>
                <label for="boekjaar">Maak factuur aan voor boekjaar: </label>
                <input type="number" name="boekjaar" value="{{ old('boekjaar') }}" />
                @error('boekjaar')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>

    </div>
    <button class="knop">
        Opslaan
    </button>
    <div class="knop">
        <a href="/facturen"> Terug </a>
    </div>


    </form>
    </div>

</x-layout>
