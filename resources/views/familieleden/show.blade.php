<x-layout>

<div class="familielid-kaart">
       <p>{{$familielid->firstname}} <a href="/families/{{$familie['id']}}"> {{$familie->lastname}}</a></p>
       <p>Geboortedatum: {{$familielid->geboortedatum}} </p>
       <p>Adres: {{$familie->address}}</p>
</div>


    {{-- 
        @auth
        <a
        href="/familieleden/manage"
        >Familie bewerken</a> 
        @endauth
    --}} 


</x-layout>

