<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function tournaments() {
        return $this->hasMany('App\Models\Tournament');
    }

    public function matches() {
        return $this->hasManyThrough('App\Models\Match', 'App\Models\Tournament');
    }
}
