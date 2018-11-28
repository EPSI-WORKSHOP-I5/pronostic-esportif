<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'game_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
