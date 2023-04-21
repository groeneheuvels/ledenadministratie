<x-layout>
    <div>
        <h2>
            Familie aanmaken
        </h2>
    </div>
    <div class="create-formulier">
        <div class="kaart-container">
            <form class="kaart" method="POST" action="/families">
                @csrf
                <div class="form-field">
                    <label for="lastname">Achternaam</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" />
                    @error('lastname')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="address">Adres</label>
                    <input type="text" name="address" value="{{ old('address') }}" />
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="{{ old('postcode') }}" />
                    @error('postcode')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="city">Stad</label>
                    <input type="text" name="city" value="{{ old('city') }}" />
                    @error('city')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop"href="/"> Terug </a></div>
            </form>
        </div>
    </div>
</x-layout>
