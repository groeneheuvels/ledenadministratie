<x-layout>
    <div>
        <p>Bewerk boekjaar: {{ $boekjaar->jaartal }}</p>
    </div>
    <div class="edit-formulier">
        <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
            @csrf
            @method('PUT')
            <div>
                <label for="jaartal">jaartal</label>
                <input type="number" name="jaartal" value="{{ $boekjaar->jaartal }}" />
                @error('jaartal')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <button class="knop">
                Opslaan
            </button>
            <a href="/boekjaren">Terug</a>
        </form>
    </div>
</x-layout>
