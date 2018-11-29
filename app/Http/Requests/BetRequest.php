<?php

namespace App\Http\Requests;

use App\Models\Match;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BetRequest extends FormRequest
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
            'match_id' => 'required|integer',
            'team_id' => 'required|integer'
        ];
    }

    public function placeBet() {
        $user = Auth::user();
        $match = Match::find($this->match_id);
        $user->pronostics()->attach($match, ['team_id' => $this->team_id]);
    }
}
