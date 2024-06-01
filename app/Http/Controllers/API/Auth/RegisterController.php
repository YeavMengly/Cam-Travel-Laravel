<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register(Request $request){

        //validation

        $validator = Validator::make($request->all(),[
            'name' => [
                'required',
                'string',
                'min:4',               
                'max:255',           
                'unique:users',        
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',              
                'regex:/[A-Z]/',      
                'regex:/[a-z]/',      
                'regex:/[0-9]/',      
                'regex:/[@$!%*#?&]/',
            ],
        ]);

        if ($validator->fails()) {
            
            return response()->json([
                'error' => $validator->errors()
            ]);
        } else {
            
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => "0"
        ]);


            $token = $user->createToken($user->email.'_Token')->accessToken;

            return response()->json([
                'status' => 200,
                'username' => $user->name,
                'token' => $token,
                'message' => 'You were register successfully'
            ]);
        }
    }
}
