<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentRequest;
use App\Models\Game;
use App\Models\Tournament;

class TournamentsController extends Controller
{
    public function get(Tournament $tournament) {
        return $tournament;
    }

    public function getAll() {
        return Tournament::all();
    }

    public function create(TournamentRequest $request, Game $game) {
        $request->persist($game->id);

        return $this->successResponse();
    }

    public function update(TournamentRequest $request, $tournamentId) {
        $request->update($tournamentId);

        return $this->successResponse();
    }
}
