<x-layout>

<div class="familielid-kaart">
       <p>{{$familielid->firstname}} <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a></p>
       <p>Geboortedatum: {{$familielid->geboortedatum}} </p>
       <p>Adres: {{$familie->address}}</p>
</div>
<div class= "knop">
    <a href="/familieleden/{{$familielid->id}}/edit">Bewerk Familielid</a>
  </div>
</x-layout>

