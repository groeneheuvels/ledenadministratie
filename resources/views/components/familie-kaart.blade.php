@props(['familie'])

<div class="familie-kaart">
       <h2>
        <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a>
       </h2>
       <p>{{$familie->address}}</p>
       <x-familie-leden />
</div>

