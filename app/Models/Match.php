<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'team1_id',
        'team2_id',
        'result',
        'tournament_id',
        'score'
    ];
}
