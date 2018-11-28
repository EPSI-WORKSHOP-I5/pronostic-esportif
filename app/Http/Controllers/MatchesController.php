<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Models\Game;
use App\Models\Match;
use App\Models\Tournament;

class MatchesController extends Controller
{
    public function get(Match $match) {
        return $match;
    }

    public function getAll() {
        return Match::all();
    }

    public function getByTournament(Tournament $tournament) {
        return $tournament->matches;
    }

    public function create(MatchRequest $request, Tournament $tournament) {
        $request->persist($tournament->id);

        return $this->successResponse();
    }

    public function update(MatchRequest $request, $matchId) {
        $request->update($matchId);

        return $this->successResponse();
    }
}
