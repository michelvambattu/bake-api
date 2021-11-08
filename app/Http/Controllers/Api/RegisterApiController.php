<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterApiController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        if($validator->fails()){
            $errors = [
    			'status'	=>	'200',
    			'title'		=>	'Bad Request',
    			'description'	=>	$validator->errors()->first()
    		];
            
            return response()->json(['data' => $errors], 200);
        }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

       $user->save();
        
        $data = [
            'status' => 'ok'
        ];

        return response()->json(['data' => $data], 200);
    }
}