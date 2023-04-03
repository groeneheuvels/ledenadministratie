<x-layout>
<div class="create-formulier">
     <form method="POST" action="/families">
        @csrf
        <div >
            <label for="lastname">Achternaam</label>
                <input
                type="text"
                name="lastname"
                value="{{old('lastname')}}"
                />
                @error('lastname')
                    <p>{{$message}}</p>
                    {{-- bericht is in engels evt aanpassen --}}
                @enderror
        </div>
        <div >
            <label for="address" >Adres</label>
                <input
                type="text"
                name="address"
                value="{{old('address')}}"
                placeholder="Voorbeeld: Sesamstraat 5, 1234 XY, Tovertuin, Neverland"
                />
                @error('address')
                    <p>{{$message}}</p>
                @enderror
        </div>
        {{-- 
            linkje voor openklappen extra formulier?
            <div>
            <label for="familielid">Nieuw Familielid</label>
                <input
                type="text"
                name="familielid"
                placeholder="Example: Remote, Boston MA, etc"
                />
        </div> --}}
        <button class="knop">
            Opslaan
         </button>
         <div class="knop">
         <a href="/" > Terug </a>
    </div>
    </form>
</div>
</x-layout>