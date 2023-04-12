<x-layout>

    <h2>Accounts</h2>

    <div class="kaart-container">

        @unless (count($users) == 0)

            @foreach ($users as $user)
                <x-user-kaart :user="$user" />
            @endforeach
        @else
            <p>Geen accounts gevonden</p>

        @endunless
    </div>
    <div class="pagination">
        {{-- is nu nog engels --}}
        {{ $users->links() }}
    </div>


</x-layout>
