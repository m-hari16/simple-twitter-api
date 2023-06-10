<?php

namespace App\Http\Controllers;

use App\Http\Builder\ResponseBuilder;
use App\Http\Resources\UserDataResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class AuthController extends Controller
{
    public function loginGoogle()
    {
        $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();

        return response()->json(ResponseBuilder::build(200, true, "Ok", ["url" => $url]), 200);
    }

    public function callbackGoogle()
    {
        $userGoogle = Socialite::driver('google')->stateless()->user();

        $dataUser = User::where('email', $userGoogle->getEmail())->first();

        // create a new user
        if (!$dataUser) {
            $dataUser = User::create([
                'name' => $userGoogle->getName(),
                'email' => $userGoogle->getEmail()
            ]);
        }

        // Generate an access token
        $accessToken = $dataUser->createToken('googleProvider')->plainTextToken;

        $bodyResponse = [
            'user' => new UserDataResponse($dataUser),
            'access_token' => $accessToken,
        ];

        return response()->json(ResponseBuilder::build(201, true, "login successfully", $bodyResponse), 201);
    }
}
