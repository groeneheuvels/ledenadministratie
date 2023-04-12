<x-layout>
    <div>
        <h2>Bewerk Account {{ auth()->user()->name }}</h2>

    </div>
    <div class="edit-formulier">
        <form method="POST" action="/users/{{ $user->id }}/edit">
            @csrf
            @method('PUT')
            <div>
                <label for="name">
                    Naam
                </label>
                <input type="text" name="name" value="{{ $user->name }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">
                    Email
                </label>
                <input type="email" name="email" value="{{ $user->email }}" />
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">
                    Nieuw wachtwoord
                </label>
                <input type="password" name="password" value="{{ $user->password }}" />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">
                    Bevestig nieuw wachtwoord
                </label>
                <input type="password" name="password_confirmation" value="{{ $user->password }}" />
                @error('password_confirmation')
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
