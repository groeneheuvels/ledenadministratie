<x-layout>
    <h1>Maak leeftijdscategorie aan</h1>
    <div class="create-formulier">
        <form method="POST" action="/leeftijdscategorieen">
            @csrf
            <div>
                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving" value="{{ old('omschrijving') }}" />
                @error('omschrijving')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>

            <div>
                <label for="ondergrens">ondergrens</label>
                <input type="text" name="ondergrens" value="{{ old('ondergrens') }}" />
                @error('ondergrens')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="bovengrens">bovengrens</label>
                <input type="text" name="bovengrens" value="{{ old('bovengrens') }}" />
                @error('bovengrens')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="kortingspercentage">kortingspercentage</label>
                <input type="text" name="kortingspercentage" value="{{ old('kortingspercentage') }}" />
                @error('kortingspercentage')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <div class="knop">
                <a href="/leeftijdscategorieen"> Terug </a>
            </div>


        </form>
    </div>
</x-layout>
