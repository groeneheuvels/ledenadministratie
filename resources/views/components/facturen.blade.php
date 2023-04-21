@php
    $openstaandeFacturen = $facturen->where('betaald', false)->sortBy('boekjaar.jaartal');
@endphp

@unless ($openstaandeFacturen->count() == 0)
    <p>Openstaande facturen:</p>
    @foreach ($openstaandeFacturen as $factuur)
        <a href="{{ url('/facturen#' . $factuur->id) }}">
            <dl>
                <dt>Factuur, boekjaar:</dt>
                <dd>{{ $factuur->boekjaar->jaartal }}</dd>
                <dt>Bedrag:</dt>
                <dd>{{ $factuur->factuurbedrag }}</dd>
            </dl>
        </a>
        <form method="POST" action="/facturen/{{ $factuur->id }}">
            @csrf
            @method('PUT')

            <div class="form-field"><button type="submit">Markeer als betaald</button></div>
        </form>
    @endforeach
@else
    <p>Geen openstaande facturen gevonden</p>
@endunless
