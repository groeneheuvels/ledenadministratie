<div class="kaart" id="{{ $factuur->id }}">

    <dl>

        @if ($factuur->betaald)
            <div id="betaald">
                <p>Betaald</p>
                <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
                <dt>Boekjaar:</dt>
                <dd>{{ $factuur->boekjaar->jaartal }}</dd>
                <dt>Familie:</dt>
                <dd>{{ $factuur->familie->lastname }}</dd>
                <dt>Bedrag:</dt>
                <dd>{{ $factuur->factuurbedrag }}</dd>
                <form method="POST" action="/facturen/{{ $factuur->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-field"><button type="submit">Markeer als onbetaald</button></div>
                </form>
            </div>
        @else
            <div id="onbetaald">
                <dt>Nog te betalen</dt>
                <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
                <dt>Boekjaar:</dt>
                <dd>{{ $factuur->boekjaar->jaartal }}</dd>
                <dt>Familie:</dt>
                <dd>{{ $factuur->familie->lastname }}</dd>
                <dt>Bedrag:</dt>
                <dd>{{ $factuur->factuurbedrag }}</dd>



                <form method="POST" action="/facturen/{{ $factuur->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-field"><button type="submit">Markeer als betaald</button></div>

                </form>
            </div>
        @endif


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
