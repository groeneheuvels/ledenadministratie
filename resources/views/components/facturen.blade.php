<ul>
    @foreach ($facturen as $factuur)
        <p>Openstaande facturen:</p>
        <li>
            <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
            <p>Bedrag: {{ $factuur->factuurbedrag }}</p>
            <p>Betaald: </p>
        </li>
    @endforeach
</ul>
