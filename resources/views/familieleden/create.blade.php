{{--  props gebruiken? --}}


<x-layout>
    <h1>Familie {{ $familie->lastname }}</h1>
    <div class="create-formulier">
        <form method="POST" action="/familieleden">
            @csrf
            <div>
                <input type="hidden" name="familie_id" value="{{ $familie->id }}">
            </div>
            <div>
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" value="{{ old('firstname') }}" />
                @error('firstname')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div>
                <label for="geboortedatum">Geboortedatum</label>
                <input type="date" name="geboortedatum" value="{{ old('geboortedatum') }}"
                    placeholder="YYYY/MM/DD" />
                @error('geboortedatum')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <div class="knop">
                <a href="/families/{{ $familie['id'] }}"> Terug </a>
            </div>
        </form>
    </div>
</x-layout>
