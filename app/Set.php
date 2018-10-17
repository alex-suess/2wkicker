<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function createNewSet($winner_id, $loser_id, $goals_loser, $color_loser) {

        $set = new Set;
        $set->player_id_winner =$winner_id;
        $set->player_id_loser = $loser_id;
        $set->goals_loser = $goals_loser;
        $set->player_color_loser = $color_loser;

        $sieger = Spieler::where('id', 'id_winner')->first();
        $sieger->sets_won += 1;
        $sieger->goals_scored += 6;
        $sieger->goals_conceded += $goals_loser;
        $sieger->save();

        $verlierer = Spieler::where('id', 'id_loser')->first();
        $verlierer->sets_lost += 1;
        $verlierer->goals_scored += $goals_loser;
        $verlierer->goals_conceded += 6;
        $verlierer->save();

        $color = Color::where('id', $color_loser)->first();
        $color->sets_lost += 1;
        $color->goals_scored += $goals_loser;
        $color->goals_conceded += 6;
        $color->save();

        $set->save();
    }

    public function match()
    {
        return $this->belongsTo('App\Match');
    }
}
