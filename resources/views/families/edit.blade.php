<x-layout>
    <div>
        <h2>Bewerk Familie {{ $familie->lastname }}</h2>
    </div>
    <div class="kaart-container">
        <div class="kaart">
            <form method="POST" action="/families/{{ $familie->id }}">
                @csrf
                @method('PUT')
                <div class="form-field">
                    <label for="lastname">Achternaam</label>
                    <input type="text" name="lastname" value="{{ $familie->lastname }}" />
                    @error('lastname')
                        <p>{{ $message }}</p>
                        {{-- bericht is in engels evt aanpassen --}}
                    @enderror
                </div>
                <div class="form-field">
                    <label for="address">Adres</label>
                    <input type="text" name="address" value="{{ $familie->address }}" />
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="{{ $familie->postcode }}" />
                    @error('postcode')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="city">Stad</label>
                    <input type="text" name="city" value="{{ $familie->city }}" />
                    @error('city')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop" href="/families/{{ $familie->id }}">Terug</a></div>
            </form>
        </div>
    </div>
</x-layout>
