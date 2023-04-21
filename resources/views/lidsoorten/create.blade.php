<x-layout>
    <div class="create-formulier">
        <form method="POST" action="/lidsoorten">
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
                <label for="contributiefactor">Contributiefactor</label>
                <input type="text" name="contributiefactor" value="{{ old('contributiefactor') }}" />
                @error('contributiefactor')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <div class="knop">
                <a href="/lidsoorten"> Terug </a>
            </div>


        </form>
    </div>
</x-layout>
