<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Authentication\Guardians\UserGuardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request, UserGuardian $authenticator)
    {
        $channel = $authenticator->attempt($request->only([
            'email', 'password',
        ]));

        return response()->json([
            'channel' => $channel->getName(),
            'token' => $channel->getStringToken(),
            'resource' => $channel->getAuthenticatable(),
            'errors' => $channel->errors()->toArray(),
        ]);
    }
}
