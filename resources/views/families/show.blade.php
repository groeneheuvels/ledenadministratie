<x-layout>
    <h2>Familie</h2>
  <x-familie-kaart :familie="$familie" />
  @auth
  <div class= "knop">
    <a href="/familieleden/create?familie_id={{ $familie->id }}">Nieuw familielid toevoegen</a>
  </div>
  <div class= "knop">
    <a href="/families/{{$familie->id}}/edit">Bewerk Familie {{$familie->lastname}}</a>
  </div>
  <form method="POST" action="/families/{{$familie->id}}">
  @csrf
  @method('DELETE')
  <div class="knop">
    <button>
      Delete Familie {{$familie->lastname}}
    </button>
  </div>
  </form>
  @endauth
  </x-layout>


