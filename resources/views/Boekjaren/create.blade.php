<x-layout>
    <div class="create-formulier">
        <form method="POST" action="/boekjaren">
            @csrf
            <div class="form-field>
                <label for="jaartal">jaartal</label>
                <input type="number" name="jaartal" value="{{ old('jaartal') }}" />
                @error('jaartal')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
            <div class="form-field">
                <label for="basiscontributie">basiscontributie</label>
                <input type="number" name="basiscontributie" value="{{ old('basiscontributie') }}" />
                @error('basiscontributie')
                    <p>{{ $message }}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
            </div>
    </div>
    <button>
        Opslaan
    </button>
    <div class="link">
        <a href="/boekjaren"> Terug </a>
    </div>


    </form>
    </div>
</x-layout>
