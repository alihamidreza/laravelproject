<?php

namespace App\Http\Controllers;

use App\ActivationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activation($token)
    {
        $activationCode = ActivationCode::whereCode($token)->first();

        if (! $activationCode){
            dd('not exists');
        }

        if ($activationCode->used == true){
            dd('used');
        }

        if ($activationCode->expire < Carbon::now()){
            dd('expired');
        }

        $activationCode->user()->update([
           'active' => 1
        ]);

        $activationCode->update([
            'used' => true
        ]);

        auth()->loginUsingId($activationCode->user->id);

        return redirect('/');
    }
}
