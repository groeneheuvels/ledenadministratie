<x-layout>
    <div class="create-formulier">
        <form method="POST" action="/families">
            @csrf
            <div>
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" value="{{ old('lastname') }}" />
                @error('lastname')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address">Adres</label>
                <input type="text" name="address" value="{{ old('address') }}" />
                @error('address')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" value="{{ old('postcode') }}" />
                @error('postcode')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="city">Stad</label>
                <input type="text" name="city" value="{{ old('city') }}" />
                @error('city')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <div class="knop">
                <a href="/"> Terug </a>
            </div>
        </form>
    </div>
</x-layout>
