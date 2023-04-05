<x-layout>

<div class="familielid-kaart">
       <p>{{$familielid->firstname}} <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a></p>
       <p>Geboortedatum: {{$familielid->geboortedatum}} </p>
       <p>Adres: {{$familie->address}}</p>
</div>

</x-layout>

