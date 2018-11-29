<?php

namespace App\Http\Controllers;

use App\Http\Requests\BetRequest;
use App\Http\Requests\MatchRequest;
use App\Models\Game;
use App\Models\Match;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MatchesController extends Controller
{
    public function get(Match $match) {
        return $match;
    }

    public function getByGame(Game $game) {
        $matches = $game->matches()->with('team1', 'team2', 'tournament')->get();

        $user = Auth::user();
        $pronostics = $user->pronostics()->pluck('bet', 'match_id');

        $matches = $matches->map(function($m) use ($pronostics) {
            $m->bet = $pronostics[$m->id] ?? null;
            return $m;
        });

        return $matches;
    }

    public function getByTournament(Tournament $tournament) {
        $matches = Match::with('team1', 'team2')
            ->where('tournament_id', $tournament->id)
            ->get();
        return $matches;
    }

    public function getByUser() {
        $user = Auth::user();

        $pronostics = $user->pronostics()->with('team1', 'team2', 'tournament')->get();
        $gameIds = $pronostics->pluck('tournament')->pluck('game_id');

        $games = Game::whereIn('id', $gameIds)->get()->pluck('name', 'id');

        $pronostics = $pronostics->map(function($p) use ($games) {
            $p->bet = $p->pivot->bet;
            $p->tournament->game_name = $games[$p->tournament->game_id];
            unset($p->pivot);
            return $p;
        });

        return $pronostics;
    }

    public function placeBet(BetRequest $request) {
        $request->placeBet();
    }

    public function removeBet(BetRequest $request, Match $match) {
        $request->removeBet($match->id);
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
