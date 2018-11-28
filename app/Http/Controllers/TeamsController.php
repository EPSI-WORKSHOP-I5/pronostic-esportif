<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;

class TeamsController extends Controller
{
    public function get(Team $team) {
        return $team;
    }

    public function getAll() {
        return Team::all();
    }

    public function getByTournament(Tournament $tournament) {
        return $tournament->teams;
    }

    public function create(TeamRequest $request, Game $game) {
        $request->persist($game->id);

        return $this->successResponse();
    }

    public function update(TeamRequest $request, $teamId) {
        $request->update($teamId);

        return $this->successResponse();
    }
}
