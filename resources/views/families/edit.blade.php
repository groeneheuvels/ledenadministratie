<x-layout>
    <div>
        <h2>Bewerk Familie</h2>
        <p>Bewerk: Familie {{ $familie->lastname }}</p>
    </div>
    <div class="edit-formulier">
        <form method="POST" action="/families/{{ $familie->id }}">
            @csrf
            @method('PUT')
            <div>
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" value="{{ $familie->lastname }}" />
                @error('lastname')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div>
                <label for="address">Adres</label>
                <input type="text" name="address" value="{{ $familie->address }}"
                    placeholder="Voorbeeld: Sesamstraat 5, 1234 XY, Tovertuin, Neverland" />
                @error('address')
                    <p>{{ $message }}</p>
                @enderror
            </div>


            <button class="knop">
                Opslaan
            </button>
            <div class="knop">
                <a href="/families/{{ $familie->id }}"> Terug </a>
            </div>
        </form>
    </div>
</x-layout>
