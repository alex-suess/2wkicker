<?php

namespace App\Http\Controllers;

use App\Color;
use App\Match;
use App\Spieler;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function newColor() {
        return view('newColor');
    }

    public function store(Request $request) {
        $color = new Color;
        $color->name = $request->input('name');
        $color->goals_scored = 0;
        $color->sets_won = 0;
        $color->save();
        $players = Spieler::all();
        $colors = Color::all();
        $matches = Match::all();
        return view('index', ['matches' => $matches, 'players' => $players, 'colors' => $colors]);
    }
}
