<x-layout>
  @include('partials._search')
  <h1>Families</h1>

  <div>

  @unless (count($families) == 0)
  
  @foreach ($families as $familie)
  <x-familie-kaart :familie="$familie" />
  @endforeach

      
  @else
    
  <p>Geen families gevonden</p>

  @endunless
</div>
<div class = "pagination">
  {{-- is nu nog engels --}}
  {{$families->links()}}
</div>


</x-layout>