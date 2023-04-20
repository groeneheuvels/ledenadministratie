@unless (count($facturen) == 0)
    @foreach ($facturen as $factuur)
        <dl>
            <dt>Boekjaar:</dt>
            <dd>{{ $factuur->boekjaar->jaartal }}</dd>
            <dt>Bedrag:</dt>
            <dd>{{ $factuur->factuurbedrag }}</dd>
        </dl>
    @endforeach
@else
    <p>Geen facturen gevonden</p>
@endunless
