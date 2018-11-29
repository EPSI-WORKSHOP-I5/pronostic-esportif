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
            'match_id' => 'required',
            'bet' => 'required'
        ];
    }

    public function placeBet() {
        $user = Auth::user();
        $user->pronostics()->sync([$this->match_id => ['bet' => $this->bet]], false);
    }

    public function removeBet($matchId) {
        $user = Auth::user();
        $user->pronostics()->detach($matchId);
    }
}
