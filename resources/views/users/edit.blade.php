<x-layout>
    <div>
        <h2>Bewerk Account {{ auth()->user()->name }}</h2>

    </div>
    <div class="kaart-container">
        <div class="kaart">
            <form method="POST" action="/users/{{ $user->id }}/edit">
                @csrf
                @method('PUT')
                <div class="form-field">
                    <label for="name">
                        Naam
                    </label>
                    <input type="text" name="name" value="{{ $user->name }}" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ $user->email }}" />
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="password">
                        Nieuw wachtwoord
                    </label>
                    <input type="password" name="password" />
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="password_confirmation">
                        Bevestig nieuw wachtwoord
                    </label>
                    <input type="password" name="password_confirmation" />
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <button>
                        Opslaan
                    </button>
                </div>
                <div class="form-field"><a class="knop" href="/"> Terug </a></div>
            </form>
        </div>
    </div>
</x-layout>
