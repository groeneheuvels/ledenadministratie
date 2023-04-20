<x-layout>

    <h2>Families</h2>

    <div class="kaart-container">

        @unless (count($families) == 0)

            @foreach ($families as $familie)
                <x-familie-kaart :familie="$familie" />
            @endforeach
        @else
            <p>Geen families gevonden</p>

        @endunless
    </div>
    <div class="pagination">
        {{-- is nu nog engels --}}
        {{ $families->links() }}
    </div>


</x-layout>
