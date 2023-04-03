<x-layout>
  @include('partials._search')
  <x-familie-kaart :familie="$familie" />
  <div class= "knop">
    <a href="/families/{{$familie->id}}/edit">Bewerken</a>
  </div>
  </x-layout>