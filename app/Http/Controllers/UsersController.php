<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function countPoints() {
        $user = Auth::user();

        return $this->countUserPoints($user->id);
    }

    // TODO filtres par tournois et jeux.
    private function countUserPoints($userId) {

        // TODO check si capable de recevoir les paramètres si la route tape countPoints().
        //$gameId = Input::get('game');
        //$tournamentId = Input::get('tournament');

        $sql = 'SELECT COUNT(mu.bet) as points
            FROM users u
            INNER JOIN matches_users mu ON mu.user_id = u.id
            INNER JOIN matches m ON m.id = mu.match_id AND mu.bet = m.result';
        $params = [];

        /*
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
        $params[] = $userId;

        $result = DB::select($sql, $params);

        return $result[0]->points;
    }

    public function leaderboard() {
        $users = User::all();

        $leaderboard = [];

        foreach ($users as $user) {
            $leaderboard[] = [
                'id' => $user->id,
                'name' => $user->name,
                'points' => $this->countUserPoints($user->id)
            ];
        }

        // Tri par points
        usort($leaderboard, function ($a, $b) {
            return $b['points'] - $a['points'];
        });

        return $leaderboard;
    }
}
