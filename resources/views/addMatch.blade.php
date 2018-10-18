@include('partials.head')
@include('partials.nav')
<div class="form_wrapper">

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
    @foreach( $players->reverse() as $player)
        <option value="{{ $player->id }}" >
            {{ $player->name }}
        </option>
    @endforeach
</select>

<div class="set1 set">
    <h2 class="setheader"> Satz 1: </h2>
    <label for="goals_player_1_1"></label>
    <input type="number" id="goals_player_1_1" name="goals_player_1_1" min="0" max="6" required/>
    <span class="font-85"> : </span>
    <label for="goals_player_2_1"></label>
    <input type="number" id="goals_player_2_1" name="goals_player_2_1" min="0" max="6" required/>

</div>

<div class="set2 set">
    <h2 class="setheader"> Satz 2: </h2>
    <label for="goals_player_1_2">
    <input type="number" id="goals_player_1_2" name="goals_player_1_2" min="0" max="6" required/>
    </label>
    <span class="font-85"> : </span>
    <label for="goals_player_2_2">
    <input type="number" id="goals_player_2_2" name="goals_player_2_2" min="0" max="6" required/>
    </label>
</div>

<div class="set3 set">
    <h2 class="setheader"> Satz 3: </h2>
    <label for="goals_player_1_3">
    <input type="number" id="goals_player_1_3" name="goals_player_1_3" min="0" max="6"/>
    </label>
    <span class="font-85"> : </span>
    <label for="goals_player_2_3">
    <input type="number" id="goals_player_2_3" name="goals_player_2_3" min="0" max="6"/>
    </label>
</div>

<button>OK</button>
{{ Form::close() }}
</div>

@include('partials/style')
