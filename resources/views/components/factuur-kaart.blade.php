<div class="kaart" id="{{ $factuur->id }}">

    <dl>

        <div>

            @if ($factuur->betaald)
                <h4 class="betaald">Betaald ✔</h4>
            @else
                <h4 class="onbetaald">Nog te betalen ⚠</h4>
            @endif
            <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
            <dt>Boekjaar:</dt>
            <dd>{{ $factuur->boekjaar->jaartal }}</dd>
            <dt>Familie:</dt>
            <dd>{{ $factuur->familie->lastname }}</dd>
            <dt>Bedrag:</dt>
            <dd> € {{ $factuur->factuurbedrag }}</dd>


            @if ($factuur->betaald)
                <form method="POST" action="/facturen/{{ $factuur->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-field"><button type="submit">Markeer als onbetaald</button></div>
                </form>
            @else
                <form method="POST" action="/facturen/{{ $factuur->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-field"><button type="submit">Markeer als betaald</button></div>

                </form>
            @endif
        </div>
    </dl>


    <form method="POST" action="/facturen/{{ $factuur->id }}">
        @csrf
        @method('DELETE')

        <div class="form-field">
            <button class=danger>
                Delete factuur
            </button>
        </div>

    </form>
</div>
