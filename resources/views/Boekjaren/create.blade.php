<x-layout>
    <h2>Boekjaar aanmaken</h2>
    <div class="kaart-container">
        <form class=kaart method="POST" action="/boekjaren">
            @csrf
            <div class="form-field">
                <label for="jaartal">jaartal</label>
                <input type="number" name="jaartal" value="{{ old('jaartal') }}" />
                @error('jaartal')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div class="form-field">
                <label for="basiscontributie">basiscontributie</label>
                <input type="number" name="basiscontributie" value="{{ old('basiscontributie') }}" />
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
            <div class="form-field"><a class="knop" href="/boekjaren"> Terug </a></div>
        </form>
    </div>
    </div>
</x-layout>
