<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'game_id',
        'name'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function teams() {
        // TODO
    }

    public function matches() {
        // TODO
    }
}
