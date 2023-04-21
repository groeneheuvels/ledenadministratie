<x-layout>
    <div>
        <div>
            <h2>
                Inloggen
            </h2>
        </div>
        <div class="kaart-container">
            <form class="kaart" method="POST" action="/users/authenticate">
                @csrf
                <div class="form-field">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"" />
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="password">
                        wachtwoord
                    </label>
                    <input type="password" name="password" value="{{ old('password') }}"" />
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="knop">
                    <button type="submit">
                        Inloggen
                    </button>
                </div>
                <div>
                    <p>Inlog aanvragen? Stuur een <a href="mailto:info@ledenadministratie.nl">email</a> naar de
                        ledenadministratie</p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
