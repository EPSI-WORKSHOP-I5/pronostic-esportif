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
        'score',
        'datetime'
    ];

    public function team1() {
        return $this->hasOne('App\Models\Team', 'id', 'team1_id');
    }

    public function team2() {
        return $this->hasOne('App\Models\Team', 'id', 'team2_id');
    }

    public function tournament() {
        return $this->belongsTo('App\Models\Tournament');
    }
}
