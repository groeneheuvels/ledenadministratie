<x-layout>
    <div>
        <div>
            <h2>
                Admin account aanmaken
            </h2>
        </div>
        <div class="kaart-container">

            <form class="kaart" method="POST" action="/users">
                @csrf

                <h4>Maak nieuw admin account</h4>
                <div class="form-field">
                    <label for="name">
                        Naam
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
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
                <div class="form-field">
                    <label for="password_confirmation">
                        Bevestig wachtwoord
                    </label>
                    <input type="password" name="password_confirmation" />
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="knop">
                    <button type="submit">
                        Registreer
                    </button>
                </div>
                <div>
                    <p>
                        Heb je al een account?
                        <a href="/login">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
