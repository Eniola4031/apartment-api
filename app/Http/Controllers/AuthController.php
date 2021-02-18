<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Hash;

class AuthController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['register', 'login']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('Eniola Password Grant Client')->accessToken;
        $response = [
            'token' => $token,
            'type' => 'Bearer',
            'merchant' => $user,
        ];
        return response()->json($response);    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string',
    //     ]);
    //     $credentials = $request->only(['email', 'password']);
    //     if (!auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Invalid Credentials'], 401);
    //     }
    //     $token = $user->createToken('Token Name')->accessToken;

    //     return $this->respondWithToken($token);
    // }


    protected function respondWithToken($token, $user = null)
    {
        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function login(Request $request) {
        try
        {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
            // $credentials = $request->only(['email', 'password']);
            // if (!auth()->attempt($credentials)) {
            //     return response()->json(['error' => 'Invalid Credentials'], 401);
            // }
    
            $user = User::query()
                ->where('email', $request->input('email'))
                ->first();
            if (!$user) {
                return response()->json([
                   'message' => "Invalid login credentials",
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY
                ]);
            }

            if (Hash::check($request->input('password'), $user->password)) {
                $token = $user->createToken('Eniola Password Grant Client')->accessToken;
                $response = [
                    'token' => $token,
                    'type' => 'Bearer',
                    'merchant' => $user,
                ];
                return response()->json($response);
            }
        } catch (\Exception $e) {
            return $this->exception($e);
        }
    }

}
