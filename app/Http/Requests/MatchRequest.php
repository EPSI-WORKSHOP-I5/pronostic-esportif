<?php

namespace App\Http\Requests;

use App\Models\Match;
use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'team1_id' => 'required|integer',
            'team2_id' => 'required|integer',
            'tournament_id' => 'nullable|integer',
            'result' => 'nullable|integer',
            'score' => 'nullable|string'
        ];
    }

    public function persist($tournamentId) {
        $attributes = $this->all();
        $attributes['tournament_id'] = $tournamentId;
        Match::create($attributes);
    }

    public function update($matchId) {
        $match = Match::find($matchId);
        $match->fill($this->all());
        $match->save();
    }
}
