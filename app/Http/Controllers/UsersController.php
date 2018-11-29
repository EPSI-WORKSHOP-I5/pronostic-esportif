<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function countPoints() {
        $user = Auth::user();

        $gameId = Input::get('game');
        $tournamentId = Input::get('tournament');

        $sql = 'SELECT COUNT(mu.bet) as points
            FROM users u
            INNER JOIN matches_users mu ON mu.user_id = u.id
            INNER JOIN matches m ON m.id = mu.match_id AND mu.bet = m.result';
        $params = [];

        /* TODO filtres par tournois et jeux.

        if ($tournamentId) {
            $sql .= ' INNER JOIN tournaments t ON t.id = m.tournament_id';
            $params[] = $tournamentId;
        }

        if ($gameId) {
            $sql .= ' INNER JOIN games g ON g.id = ';
            $params[] = $gameId;
        }
        */

        $sql .= ' WHERE u.id = ?';
        $params[] = $user->id;

        $result = DB::select($sql, $params);

        return $result[0]->points;
    }
}
