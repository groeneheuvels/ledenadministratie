<x-layout>
  @include('partials._search')
  <h1>Families</h1>

  @unless (count($families) == 0)
  
  @foreach ($families as $familie)
  <x-familie-kaart :familie="$familie" />
  @endforeach

      
  @else
    
  <p>Geen families gevonden</p>

  @endunless


</x-layout>