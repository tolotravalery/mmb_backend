<h1>Showing {{ $popup->title }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $popup->title }}</h2>
    <p>
        <strong>date ajout:</strong> {{ $popup->dateAjout }}<br>
        <strong>Active:</strong>
        @if($popup->active==1)
            activé
        @elseif($popup->active==0)
            désactivé
        @endif

    </p>
    <img src="{{ $popup->path }}">
</div>

</div>