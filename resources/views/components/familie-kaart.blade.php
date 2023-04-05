@props(['familie'])

<div class="familie-kaart">
       <h2>
        <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a>
       </h2>
       <h3>Berekende Contributie bedrag</h3>
       <p>{{$familie->address}}</p>
       <x-familie-leden :familieleden="$familie->familieleden"/>
</div>

