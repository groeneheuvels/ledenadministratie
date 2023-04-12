<x-layout>
    <div>
        <p>Bewerk Lidsoort: {{ $lidsoort->omschrijving }}</p>
    </div>
    <div class="edit-formulier">
        <form method="POST" action="/lidsoorten/{{ $lidsoort->id }}">
            @csrf
            @method('PUT')
            <div>
                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving" value="{{ $lidsoort->omschrijving }}" />
                @error('omschrijving')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div>
                <label for="contributiefactor">Contributiefactor</label>
                <input type="text" name="contributiefactor" value="{{ $lidsoort->contributiefactor }}" />
                @error('contributiefactor')
                    <p>{{ $message }}</p>
                @enderror
            </div>


            <button class="knop">
                Opslaan
            </button>
        </form>
    </div>
</x-layout>
