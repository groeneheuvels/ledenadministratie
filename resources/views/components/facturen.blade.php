@unless (count($facturen) == 0)
    <p>Openstaande facturen:</p>
    @foreach ($facturen as $factuur)
        <a href="{{ url('/facturen#' . $factuur->id) }}">
            <dl>
                <dt>Factuur, boekjaar:</dt>
                <dd>{{ $factuur->boekjaar->jaartal }}</dd>
                <dt>Bedrag:</dt>
                <dd>{{ $factuur->factuurbedrag }}</dd>
            </dl>
        </a>
    @endforeach
@else
    <p>Geen facturen gevonden</p>
@endunless
