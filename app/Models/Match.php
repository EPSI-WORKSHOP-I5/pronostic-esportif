<?php

namespace Models\App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'team1_id',
        'team2_id',
        'winner_id',
        'score',
        'cote',
    ];
}
