<x-layout>
    <h2>Maak leeftijdscategorie aan</h2>
    <div class="kaart-container">
        <div class="kaart">
            <form method="POST" action="/leeftijdscategorieen">
                @csrf
                <div class="form-field">
                    <label for="omschrijving">Omschrijving</label>
                    <input type="text" name="omschrijving" value="{{ old('omschrijving') }}" />
                    @error('omschrijving')
                        <p>{{ $message }}</p>
                        {{-- bericht is in engels evt aanpassen --}}
                    @enderror
                </div>
                <div class="form-field">
                    <label for="ondergrens">ondergrens</label>
                    <input type="text" name="ondergrens" value="{{ old('ondergrens') }}" />
                    @error('ondergrens')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="bovengrens">bovengrens</label>
                    <input type="text" name="bovengrens" value="{{ old('bovengrens') }}" />
                    @error('bovengrens')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="kortingspercentage">kortingspercentage</label>
                    <input type="text" name="kortingspercentage" value="{{ old('kortingspercentage') }}" />
                    @error('kortingspercentage')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop"href="/leeftijdscategorieen"> Terug </a></div>
            </form>
        </div>
    </div>
</x-layout>
