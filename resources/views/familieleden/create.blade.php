{{--  props gebruiken? --}}


<x-layout>
    <h1>Familie {{ $familie->lastname }}</h1>
    <div class="create-formulier">
        <form method="POST" action="/familieleden">
            @csrf
            <div>
                <input type="hidden" name="familie_id" value="{{ $familie->id }}">
            </div>
            <div class="form-field">
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" value="{{ old('firstname') }}" />
                @error('firstname')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div class="form-field">
                <label for="geboortedatum">Geboortedatum</label>
                <input type="date" name="geboortedatum" value="{{ old('geboortedatum') }}"
                    placeholder="YYYY/MM/DD" />
                @error('geboortedatum')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label for="lidsoort">Lidsoort</label>
                <select name="lidsoort" id="lidsoort">
                    @foreach ($lidsoorten as $lidsoort)
                        <option value="{{ $lidsoort->id }}">
                            {{ $lidsoort->omschrijving }}</option>
                    @endforeach
                </select>
                @error('lidsoort')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button>
                Opslaan
            </button>
            <a class="link" href="/families/{{ $familie['id'] }}"> Terug </a>
        </form>
    </div>
</x-layout>
