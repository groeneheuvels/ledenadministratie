<div class="kaart">
    <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
    <p>Betreft: </p>
    <ul>
        <li>
            Boekjaar: {{ $factuur->boekjaar->jaartal }}
        </li>
        <li>Familie {{ $factuur->familie->lastname }} </li>
    </ul>
    {{-- <p>Betreft boekjaar: {{ $factuur->boekjaar->jaartal }} </p>
    <p>Betreft Familie: {{ $factuur->familie->lastname }}</p> --}}
    <p>Bedrag: {{ $factuur->factuurbedrag }}</p>

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
