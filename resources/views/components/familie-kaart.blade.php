@props(['familie'])

<div class="familie-kaart">
       <h3>
        <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a>
       </h3>
       <p>Berekende Contributie bedrag</p>
       <p>{{$familie->address}}</p>
       <x-familie-leden :familieleden="$familie->familieleden"/>
</div>

