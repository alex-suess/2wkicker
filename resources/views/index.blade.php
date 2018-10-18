@include('partials.head')
<body>

@include('partials.nav')
<div class="content">
<div class="playertable">
    <h2>Tabelle</h2>
    <table>
        <th>Spieler</th>
        <th>Spiele gewonnen</th>
        <th>Spiele verloren</th>
        <th>Sätze gewonnen</th>
        <th>Sätze verloren</th>
        <th>Tore erzielt</th>
        <th>Tore kassiert</th>

        @foreach ($players as $player)
            <tr>
                <td>{{ $player->name }} </td>
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
        <th>Sätze gewonnen</th>
        <th>Tore erzielt</th>
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
<div class="matchestable">
    <h2>Partien</h2>
    <div class="table_wrapper">
    <table>
        <tr>
            <th>
                Datum
            </th>
            <th>
                Spieler
            </th>
            <th>
                Satz 1
            </th>
            <th>
                Satz 2
            </th>
            <th>
                Satz 3
            </th>
        </tr>
        @foreach ($matches->reverse() as $match)
            <tr>
                <td>
                    {{ $match->created_at }}
                </td>
                <td>{{ \App\Spieler::all()->where('id', $match->player_1_id)->first()->name }}</td>
                <td class="coloryellow">{{ \App\Set::all()->where('id', $match->set1_id)->first()->goals_player_1 }}</td>
                <td class="colorred">{{ \App\Set::all()->where('id', $match->set2_id)->first()->goals_player_1 }}</td>
                <td class="coloryellow">{{ \App\Set::all()->where('id', $match->set3_id)->first()->goals_player_1 }}</td>
            </tr>
            <tr style="border-bottom: 2px solid grey;">
                <td></td>
                <td>{{ \App\Spieler::all()->where('id', $match->player_2_id)->first()->name }}</td>
                <td class="colorred">{{ \App\Set::all()->where('id', $match->set1_id)->first()->goals_player_2 }}</td>
                <td class="coloryellow">{{ \App\Set::all()->where('id', $match->set2_id)->first()->goals_player_2 }}</td>
                <td class="colorred">{{ \App\Set::all()->where('id', $match->set3_id)->first()->goals_player_2 }}</td>
            </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
</body>
@include('partials/style')
