<x-layout>
    <div>
        <p>Bewerk leeftijdscategorie: {{ $leeftijdscategorie->omschrijving }}</p>
    </div>
    <div class="edit-formulier">
        <form method="POST" action="/leeftijdscategorieen/{{ $leeftijdscategorie->id }}">
            @csrf
            @method('PUT')
            <div>
                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving" value="{{ $leeftijdscategorie->omschrijving }}" />
                @error('omschrijving')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div>
                <label for="kortingspercentage">kortingspercentage</label>
                <input type="text" name="kortingspercentage" value="{{ $leeftijdscategorie->kortingspercentage }}" />
                @error('kortingspercentage')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ondergrens">ondergrens</label>
                <input type="text" name="ondergrens" value="{{ $leeftijdscategorie->ondergrens }}" />
                @error('ondergrens')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="bovengrens">bovengrens</label>
                <input type="text" name="bovengrens" value="{{ $leeftijdscategorie->bovengrens }}" />
                @error('bovengrens')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
        </form>
    </div>
</x-layout>
