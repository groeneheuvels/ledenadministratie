<x-layout>

    <h2>Bewerk Familielid</h2>

    <div class="kaart-container">
        <div class="kaart">
            <form method="POST" action="/familieleden/{{ $familielid->id }}">
                @csrf
                @method('PUT')
                <div class="form-field">
                    <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" value="{{ $familielid->firstname }}" />
                    @error('firstname')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="geboortedatum">Geboortedatum</label>
                    <input type="date" name="geboortedatum" value="{{ $familielid->geboortedatum }}" />
                    @error('geboortedatum')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <div class="form-field">
                        <label for="lidsoort_id">Lidsoort</label>
                        <select name="lidsoort_id" id="lidsoort_id">
                            @foreach ($lidsoorten as $lidsoort)
                                <option value="{{ $lidsoort->id }}" @if ($lidsoort->id == $familielid->lidsoort_id) selected @endif>
                                    {{ $lidsoort->omschrijving }}</option>
                            @endforeach
                        </select>
                        @error('lidsoort_id')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-field">
                        <button>
                            Opslaan
                        </button>
                    </div>
                    <a class="knop" href="/familieleden/{{ $familielid->id }}">Terug</a>
            </form>
        </div>
    </div>
</x-layout>
