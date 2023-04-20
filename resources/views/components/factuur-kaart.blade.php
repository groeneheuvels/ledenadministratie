<div class="kaart">
    <p> Factuur aangemaakt op: {{ date('d-m-Y', strtotime($factuur->created_at)) }}</p>
    <p>Betreft boekjaar: {{ $factuur->boekjaar->jaartal }} </p>
    {{--  <p>Betreft Familie: </p> --}}
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
