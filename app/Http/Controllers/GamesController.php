<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;

class GamesController extends Controller
{
    public function get(Game $game) {
        return $game;
    }

    public function getAll() {
        return Game::all();
    }

    public function create(GameRequest $request) {
        $request->persist();

        return $this->successResponse();
    }

    public function update(GameRequest $request, $gameId) {
        $request->update($gameId);

        return $this->successResponse();
    }
}
