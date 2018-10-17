@include('partials.head')
<body>

@include('partials.nav')
<div class="playertable">
    <h2>Tabelle</h2>
    <table>
        <th>Spieler</th>
        <th>Siege</th>
        <th>Niederlagen</th>
        <th>Sätze +</th>
        <th>Sätze -</th>
        <th>Tore +</th>
        <th>Tore -</th>

        @foreach ($players as $player)
            <tr>
                <td><a href="/player/{{ $player->id }}"> {{ $player->name }} </a></td>
                <td>{{ $player->games_won }}</td>
                <td>{{ $player->games_lost }}</td>
                <td>{{ $player->sets_won }}</td>
                <td>{{ $player->sets_lost }}</td>
                <td>{{ $player->goals_scored }}</td>
                <td>{{ $player->goals_conceded }}</td>
            </tr>
        @endforeach
    </table>
<table>
    <tr>
        <th>Farbe</th>
        <th>Sätze+</th>
        <th>Tore+</th>
    </tr>
    @foreach ($colors as $color)
        <tr>
            <td>{{ $color->name }}</td>
            <td>{{ $color->sets_won }}</td>
            <td>{{ $color->goals_scored }}</td>
        </tr>
    @endforeach
</table>
</div>
</body>
@include('partials/style')
</html>
