<div class="kaart" id="{{ $factuur->id }}">
    <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
    <dl>
        <dt>Boekjaar:</dt>
        <dd>{{ $factuur->boekjaar->jaartal }}</dd>
        <dt>Familie:</dt>
        <dd>{{ $factuur->familie->lastname }}</dd>
        <dt>Bedrag:</dt>
        <dd>{{ $factuur->factuurbedrag }}</dd>
        <dt>Betaald:</dt>
        <dd>
            @if ($factuur->betaald)
                ja
            @else
                nee
            @endif
        </dd>
        <dd>
            <form method="POST" action="/facturen/{{ $factuur->id }}">
                @csrf
                @method('PUT')
                @if ($factuur->betaald)
                    <button type="submit">Markeer als onbetaald</button>
                @else
                    <button type="submit">Markeer als betaald</button>
                @endif
            </form>
        </dd>
    </dl>


    <form method="POST" action="/facturen/{{ $factuur->id }}">
        @csrf
        @method('DELETE')
        <div class="knop">
            <button>
                Delete factuur
            </button>
        </div>
    </form>
</div>
