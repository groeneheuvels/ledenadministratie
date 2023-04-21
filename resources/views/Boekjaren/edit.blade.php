<x-layout>
    <div>
        <p>Bewerk boekjaar: {{ $boekjaar->jaartal }}</p>
    </div>
    <div class="kaart">
        <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="jaartal">jaartal</label>
                <input type="number" name="jaartal" value="{{ $boekjaar->jaartal }}" />
                @error('jaartal')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div class="form-field">
                <label for="basiscontributie">basiscontributie</label>
                <input type="number" name="basiscontributie" value="{{ $boekjaar->basiscontributie }}" />
                @error('basiscontributie')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <button>
                Opslaan
            </button>
            <a class="knop" href="/boekjaren">Terug</a>
        </form>
    </div>
</x-layout>
