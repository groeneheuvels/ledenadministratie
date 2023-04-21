<x-layout>
    <div>
        <h2>Bewerk Familielid</h2>
        <p>Bewerk: {{ $familielid->firstname }} {{ $familie->lastname }}</p>
    </div>
    <div class="edit-formulier">
        <form method="POST" action="/familieleden/{{ $familielid->id }}">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" value="{{ $familielid->firstname }}" />
                @error('firstname')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
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
                <div>
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

                <button>
                    Opslaan
                </button>
                <a href="/familieleden/{{ $familielid->id }}">Terug</a>
        </form>
    </div>
</x-layout>
