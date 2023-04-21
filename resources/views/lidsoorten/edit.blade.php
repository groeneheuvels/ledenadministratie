<x-layout>

    <h2>Bewerk Lidsoort: {{ $lidsoort->omschrijving }}</h2>

    <div class="kaart-container">
        <div class="kaart">
            <form method="POST" action="/lidsoorten/{{ $lidsoort->id }}">
                @csrf
                @method('PUT')
                <div class="form-field">
                    <label for="omschrijving">Omschrijving</label>
                    <input type="text" name="omschrijving" value="{{ $lidsoort->omschrijving }}" />
                    @error('omschrijving')
                        <p>{{ $message }}</p>
                        {{-- bericht is in engels evt aanpassen --}}
                    @enderror
                </div>
                <div class="form-field">
                    <label for="contributiefactor">Contributiefactor</label>
                    <input type="text" name="contributiefactor" value="{{ $lidsoort->contributiefactor }}" />
                    @error('contributiefactor')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop" href="/lidsoorten">Terug</a></div>
            </form>
        </div>
    </div>
</x-layout>
