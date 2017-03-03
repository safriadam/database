<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	public function authenticate(Request $request) {
		$credentials = $request->only('email', 'password');

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
			// something went wrong
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		// if no errors are encountered we can return a JWT
		return response()->json(compact('token'));
	}

	public function getAuthenticatedUser() {
		try {

			if (!$user = JWTAuth::parseToken()->authenticate()) {
				return response()->json(['user_not_found'], 404);
			}

		} catch (TokenExpiredException $e) {

			return response()->json(['token_expired'], $e->getStatusCode());

		} catch (TokenInvalidException $e) {

			return response()->json(['token_invalid'], $e->getStatusCode());

		} catch (JWTException $e) {

			return response()->json(['token_absent'], $e->getStatusCode());

		}

		return response()->json(compact('user'));
	}

	public function register(Request $request) {
		$newuser = $request->all();
		$password = Hash::make($request->input('password'));
		$newuser['password'] = $password;
		return User::create($newuser);
	}

}