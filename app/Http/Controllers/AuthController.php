<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
App\Http\Controllers\Technicien;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (! $token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'failed! Email or password incorrect'], 401);
    //     }
    //     return $this->respondWithToken($token);
        
    // }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'failed! Email or password incorrect'], 401);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Get the user's role
        $role = $user->role;

        return $this->respondWithToken($token, $role);
    }
    public function signup(Request $request) {
        
        
        $validated = $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role'=>'required',
        ]);

        // Create user
        $userData = User::create($request->all());
        $userData = Technicien::create($request->all());

        
        // Response
        return response( $userData, 201);

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

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$role)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'role'=>$role
        ]);
    }
}
