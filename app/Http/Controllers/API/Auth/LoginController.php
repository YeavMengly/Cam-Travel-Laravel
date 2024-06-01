<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
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
                'validation_errors'=>$validator->messages()
            ]);
        }
        else{

            $user = $request->only('email', 'password');
            $user = User::where('email' , $request->email)->first();

            $user = User::find(1);


            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status'=>401,
                    'message'=>'Invalid Credentials'
                ]);
            }
            else{

                //problem
                if (Auth::check()) {
                    $user->assignRole('admin');
                    return response()->json([
                        'token' => $user->createToken('_Token')->accessToken,
                    ]);
                } else {
                    return response()->json(['error' => 'Authentication failed'], 401);
                }

                if (auth()->user()->hasRole.('admin')) {
                    // User is an admin
                }
                
            }
        }
    }
}
