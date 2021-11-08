<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;


class AuthApiController extends Controller
{

    
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            $errors = [
    			'status'	=>	'401',
    			'title'		=>	'Unauthorized',
    			'description'	=>	'Incorrect username or password!'
    		];

            return response()->json(['errors' => $errors], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        $data = [
            'status' => '200',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 500
        ];

        return response()->json([
          'data' => $data
        ]);
    }
}