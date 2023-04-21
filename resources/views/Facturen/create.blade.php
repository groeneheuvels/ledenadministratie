<x-layout>
    <h2>Factuur aanmaken</h2>
    <div class="create-formulier">
        <form method="POST" action="/facturen">
            @csrf
            <div class="form-field">
                <label for="familie">Maak factuur aan voor familie: </label>
                <select name="familie" id="familie">
                    @foreach ($families as $familie)
                        <option value="{{ $familie->id }}">
                            {{ $familie->lastname }}</option>
                    @endforeach
                </select>
                @error('familie')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label for="boekjaar">Betreft boekjaar: </label>
                <select name="boekjaar" id="boekjaar">
                    @foreach ($boekjaren as $boekjaar)
                        <option value="{{ $boekjaar->id }}">
                            {{ $boekjaar->jaartal }}</option>
                    @endforeach
                </select>
                @error('boekjaar')
                    <p>{{ $message }}</p>
                @enderror
            </div>

    </div>
    <button>
        Opslaan
    </button>
    <div class="link">
        <a href="/facturen"> Terug </a>
    </div>


    </form>
    </div>

</x-layout>
