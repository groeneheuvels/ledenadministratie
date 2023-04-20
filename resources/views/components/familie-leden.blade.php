{{-- @props(['familieleden']) --}}

<ul>
    @foreach ($familieleden as $familielid)
        <li><a href="/familieleden/{{ $familielid['id'] }}"> {{ $familielid->firstname }}</a></li>
    @endforeach
</ul>
