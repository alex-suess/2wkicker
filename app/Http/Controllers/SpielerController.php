<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Spieler;

class SpielerController extends Controller
{
	public function store (Request $request) {
		$name = $request->only('name');
		Spieler::create($name);
		return view('addSpieler');
	}
	public function add() {
		return view('addSpieler');
	}

	public function show($id) {
		$player = Spieler::where('id', $id)->first();
		return view('player', ['player' => $player]);
	}
}
