<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
        /**
     * Creazione utente 
     *
     * 
		@param  [string] username
     * 
		@param  [string] email
     * 
		@param  [string] password
     * 
		@param  [string] password_confirmation
     * 
		@return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
	
        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
		
        $user->save();
		
        return response()->json(['message' => 'Successfully created user!'], 201);
    }
  
    /**
     * Login utente e creazione del token
     *
     * 
		@param  [string] email
     * 
		@param  [string] password
     * 
		@param  [boolean] remember_me
     * 
		@return [string] access_token
     * 
		@return [string] token_type
     * 
		@return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
			'username' => 'required|string',
            'password' => 'required|string',
        ]);
		
        $credentials = request(['username', 'password']);
		
        if(!Auth::attempt($credentials)){
			
			return response()->json(['message' => 'Unauthorized'], 401);
		}

		$user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
		
		$token->save();
			
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
  
    /**
     * Logout utente (Revoca del token)
     *
     * 
		@return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
		
        return response()->json(['message' => 'Successfully logged out']);
    }
  
    /**
     * Ritorna le informazioni sul utente loggato
     *
     * 
		@return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
