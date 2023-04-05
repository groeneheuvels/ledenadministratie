<x-layout>
    <div>
        <h2>Bewerk Familielid</h2>
        <p>Bewerk: {{$familielid->firstname}} {{$familie->lastname}}</p>
    </div>
    <div class="edit-formulier">
         <form method="POST" action="/familieleden/{{$familielid->id}}">
            @csrf
            @method('PUT')
            <div >
                <label for="firstname">Voornaam</label>
                    <input
                    type="text"
                    name="firstname"
                    value="{{$familielid->firstname}}"
                    />
                    @error('firstname')
                        <p>{{$message}}</p>
                        {{-- bericht is in engels evt aanpassen --}}
                    @enderror
            </div>
            <div >
                <label for="geboortedatum" >Geboortedatum</label>
                    <input
                    type="date"
                    name="geboortedatum"
                    value="{{$familielid->geboortedatum}}"
                    />
                    @error('geboortedatum')
                        <p>{{$message}}</p>
                    @enderror
            </div>
                <button class="knop">
                    Opslaan
                 </button>
                 <div class="knop">
                 <a href="/familieleden/{{$familielid->id}}" > Terug </a>
            </div>
        </form>
    </div>
    </x-layout>