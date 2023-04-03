<x-layout>
  @include('partials._search')
  <x-familie-kaart :familie="$familie" />
  <div class= "knop">
    <a href="/families/{{$familie->id}}/edit">Bewerken</a>
  </div>
  <form method="POST" action="/families/{{$familie->id}}">
  @csrf
  @method('DELETE')
  <div class="knop">
    <button>
      Delete
    </button>
  </div>
  </form>
  </x-layout>