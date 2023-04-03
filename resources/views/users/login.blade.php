<x-layout>
    <div>
        <div>
            <h2>
            Inloggen
            </h2>
        </div>
        <form method="POST" action="/users/authenticate">
            @csrf
            <div>
                <label for="email">
                Email
                </label>
                <input
                type="email"
                name="email"
                value="{{old('email')}}""
                />
                @error('email')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="password">
                wachtwoord
                </label>
                <input
                type="password"
                name="password"
                value="{{old('password')}}""
                />
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="knop">
                <button type="submit">
                Inloggen
                </button>
            </div>
            <div>
                <p>
                Nog geen account?
                <a href="/register">registreer</a>
                </p>
         </div>
        </form>
    </div>
</x-layout>