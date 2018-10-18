<?php

namespace App\Http\Controllers;

use App\Color;
use App\Match;
use App\Set;
use App\Spieler;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function store (Request $request) {
        $match = new Match();
        $player_1_id = $request->input('player_id_player_1');
        $player_2_id = $request->input('player_id_player_2');
        $player1 = Spieler::all()->where('id', $player_1_id)->first();
        $player2 = Spieler::all()->where('id', $player_2_id)->first();
        $match->player_1_id = $player_1_id;
        $match->player_2_id = $player_2_id;
        $red = Color::all()->where('id', 1)->first();
        $yellow = Color::all()->where('id', 2)->first();

        $winner_set_1 = 0;
        $winner_set_2 = 0;
        $winner_set_3 = 0;

        $set1_data = $request->only( 'goals_player_1_1', 'goals_player_2_1');
        $set2_data = $request->only( 'goals_player_1_2', 'goals_player_2_2');

        $set_1 = new Set();
        $set_1->player_1_id = $player_1_id;
        $set_1->player_2_id = $player_2_id;
        $set_1->goals_player_1 = $set1_data['goals_player_1_1'];
        $set_1->goals_player_2 = $set1_data['goals_player_2_1'];
        $yellow->goals_scored += $set1_data['goals_player_1_1'];
        $red->goals_scored += $set1_data['goals_player_2_1'];
        $player1->goals_scored += $set_1->goals_player_1;
        $player2->goals_scored += $set_1->goals_player_2;
        $player1->goals_conceded += $set_1->goals_player_2;

        $player2->goals_conceded += $set_1->goals_player_1;
        if ($set_1->goals_player_2 > $set_1->goals_player_1) {
            $player2->sets_won += 1;
            $player1->sets_lost += 1;
            $winner_set_1 = $player2->id;
            $red->sets_won += 1;
        }  else {
            $player1->sets_won += 1;
            $player2->sets_lost += 1;
            $winner_set_1 = $player1->id;
            $yellow->sets_won += 1;
        }



        $set_2 = new Set();
        $set_2->player_1_id = $player_1_id;
        $set_2->player_2_id = $player_2_id;
        $set_2->goals_player_1 = $set2_data['goals_player_1_2'];
        $set_2->goals_player_2 = $set2_data['goals_player_2_2'];
        $yellow->goals_scored += $set2_data['goals_player_2_2'];
        $red->goals_scored += $set2_data['goals_player_1_2'];
        $player1->goals_scored += $set_2->goals_player_1;
        $player2->goals_scored += $set_2->goals_player_2;
        $player1->goals_conceded += $set_2->goals_player_2;
        $player2->goals_conceded += $set_2->goals_player_1;
        if ($set_2->goals_player_2 > $set_2->goals_player_1) {
            $player2->sets_won += 1;
            $player1->sets_lost += 1;
            $winner_set_2 = $player2->id;
            $yellow->sets_won += 1;
        }  else {
            $player1->sets_won += 1;
            $player2->sets_lost += 1;
            $winner_set_2 = $player1->id;
            $red->sets_won += 1;
        }

        $set_1->save();
        $set_2->save();
        $match->set1_id = $set_1->id;
        $match->set2_id = $set_2->id;

        if (!empty($request->only('goals_player_1_3'))) {
            $set3_data = $request->only('goals_player_1_3', 'goals_player_2_3');

            $set_3 = new Set();
            $set_3->player_1_id = $player_1_id;
            $set_3->player_2_id = $player_2_id;
            $set_3->goals_player_1 = $set3_data['goals_player_1_3'];
            $set_3->goals_player_2 = $set3_data['goals_player_2_3'];
            $yellow->goals_scored += $set3_data['goals_player_1_3'];
            $red->goals_scored += $set3_data['goals_player_2_3'];
            $player1->goals_scored += $set_3->goals_player_1;
            $player2->goals_scored += $set_3->goals_player_2;
            $player1->goals_conceded += $set_3->goals_player_2;
            $player2->goals_conceded += $set_3->goals_player_1;
            if ($set_3->goals_player_2 > $set_3->goals_player_1) {
                $player2->sets_won += 1;
                $player1->sets_lost += 1;
                $winner_set_3 = $player2->id;
                $red->sets_won += 1;
            }  else if  ($set_3->goals_player_2 < $set_3->goals_player_1){
                $player1->sets_won += 1;
                $player2->sets_lost += 1;
                $winner_set_3 = $player1->id;
                $yellow->sets_won += 1;
            }
            $set_3->save();
            $match->set3_id = $set_3->id;
        }
        if ($player_1_id == $winner_set_1 && $player_1_id == $winner_set_2) {
            $player1->games_won += 1;
            $player2->games_lost += 1;
        }else if ($player_1_id == $winner_set_3 && $player_1_id == $winner_set_2) {
            $player1->games_won += 1;
            $player2->games_lost += 1;
        } else if ($player_1_id == $winner_set_1 && $player_1_id == $winner_set_3){
            $player1->games_won += 1;
            $player2->games_lost += 1;
        } else {
            $player2->games_won += 1;
            $player1->games_lost += 1;
        }
        $player1->save();
        $player2->save();
        $red->save();
        $yellow->save();
        $match->save();
        $players = Spieler::all();
       $colors = Color::all();
       $matches = Match::all();
        return view('index', ['players' => $players, 'colors' => $colors, 'matches' => $matches]);
    }


    public function add() {
        $players = Spieler::all();
        return view('addMatch', compact('players', $players));
    }

        public function show($id) {
        $match = Match::where('id', $id)->first();
        return view('match', ['match' => $match]);
    }

    public function display (){
        $matches = Match::all();
        return view('matches', ['matches' => $matches]);
    }
}
