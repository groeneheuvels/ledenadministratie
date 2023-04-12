@props(['user'])

<div class="kaart">
    <h3>
        <a href="/users/{{ $user['id'] }}"> {{ $user->name }}</a>
    </h3>
    <p>E-mail: {{ $user->email }}</p>
</div>
