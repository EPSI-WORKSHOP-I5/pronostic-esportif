<?php

namespace App\Http\Requests;

use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|max:255'
        ];
    }

    public function persist($gameId) {
        $attributes = $this->all();
        $attributes['game_id'] = $gameId;
        Team::create($attributes);
    }

    public function update($teamId) {
        $match = Team::find($teamId);
        $match->fill($this->all());
        $match->save();
    }
}
