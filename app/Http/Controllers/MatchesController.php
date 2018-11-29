<?php

namespace App\Http\Controllers;

use App\Http\Requests\BetRequest;
use App\Http\Requests\MatchRequest;
use App\Models\Game;
use App\Models\Match;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    public function get(Match $match) {
        return $match;
    }

    public function getAll() {
        return Match::all();
    }

    public function getByTournament(Tournament $tournament) {
        $matches = Match::with('team1', 'team2')
            ->where('tournament_id', $tournament->id)
            ->get();
        return $matches;
    }

    public function getByUser() {
        $user = Auth::user();
        $pronostics = $user->pronostics->map(function($p) {
            $p->team_id = $p->pivot->team_id;
            unset($p->pivot);
            return $p;
        });
        return $pronostics;
    }

    public function placeBet(BetRequest $request) {
        $request->placeBet();
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
