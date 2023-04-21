<x-layout>

    <h2>Bewerk boekjaar: {{ $boekjaar->jaartal }}</h2>

    <div class="kaart-container">
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
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop" href="/boekjaren">Terug</a></div>
            </form>
        </div>
    </div>
</x-layout>
