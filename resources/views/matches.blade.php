@include('partials.head')
@include('partials.nav')
<div class="matchestable">
<h2>Partien</h2>
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
    @foreach ($matches as $match)
        <tr>
            <td>
                {{ $match->created_at }}
            </td>
            <td>{{ \App\Spieler::all()->where('id', $match->player_1_id)->first()->name }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set1_id)->first()->goals_player_1 }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set2_id)->first()->goals_player_1 }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set3_id)->first()->goals_player_1 }}</td>
        </tr>
        <tr style="border-bottom: 2px solid grey;">
            <td></td>
            <td>{{ \App\Spieler::all()->where('id', $match->player_2_id)->first()->name }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set1_id)->first()->goals_player_2 }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set2_id)->first()->goals_player_2 }}</td>
            <td>{{ \App\Set::all()->where('id', $match->set3_id)->first()->goals_player_2 }}</td>
        </tr>
    @endforeach
</table>
</div>
@include('partials/style')
