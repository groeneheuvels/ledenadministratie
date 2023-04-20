<ul>
    @foreach ($facturen as $factuur)
        <li>
            {{--  <a href="/facturen/{{ $factuur->id }}"> --}}
            <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
            <p>Bedrag: {{ $factuur->factuurbedrag }}</p>
            {{-- </a> --}}

        </li>
    @endforeach
</ul>
