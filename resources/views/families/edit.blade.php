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
                <input type="text" name="address" value="{{ $familie->address }}" />
                @error('address')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" value="{{ $familie->postcode }}" />
                @error('postcode')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="city">Stad</label>
                <input type="text" name="city" value="{{ $familie->city }}" />
                @error('city')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <a href="/families/{{ $familie->id }}">Terug</a>
        </form>
    </div>
</x-layout>
