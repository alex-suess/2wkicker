@include('partials.head')
@include('partials.nav')

{{ Form::open(array('route' => 'match-store')) }}
@csrf
<label for="player_id_player_1">Spieler 1: (1. Satz gelb)</label>
<select name="player_id_player_1" id="player_id_player_1">
    @foreach( $players as $player)
        <option value="{{ $player->id }}">
            {{ $player->name }}
        </option>
    @endforeach
</select>

<label for="player_id_player_2">Spieler 2: (1. Satz rot)</label>
<select name="player_id_player_2" id="player_id_player_2">
    @foreach( $players as $player)
        <option value="{{ $player->id }}" >
            {{ $player->name }}
        </option>
    @endforeach
</select>

<div class="set1">
    <h3> Satz 1: </h3>
    <label for="goals_player_1_1">Tore Spieler 1</label>
    <input type="number" id="goals_player_1_1" name="goals_player_1_1"/>

    <label for="goals_player_2_1">Tore Spieler 2</label>
    <input type="number" id="goals_player_2_1" name="goals_player_2_1"/>

</div>

<div class="set2">
    <h3> Satz 2: </h3>
    <label for="goals_player_1_2">Tore Spieler 1</label>
    <input type="number" id="goals_player_1_2" name="goals_player_1_2"/>

    <label for="goals_player_2_2">Tore Spieler 2</label>
    <input type="number" id="goals_player_2_2" name="goals_player_2_2"/>

</div>

<div class="set3">
    <h3> Satz 3: </h3>
    <label for="goals_player_1_3">Tore Spieler 1</label>
    <input type="number" id="goals_player_1_3" name="goals_player_1_3"/>

    <label for="goals_player_2_3">Tore Spieler 2</label>
    <input type="number" id="goals_player_2_3" name="goals_player_2_3"/>

</div>

<button>OK</button>
{{ Form::close() }}
@include('partials/style')
