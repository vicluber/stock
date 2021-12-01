<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $fields = $request->validate(['email' => 'required|string', 'password' => 'required|string']);
            $user = User::where('email', $fields['email'])->first();
            if($user == null || !Hash::check($fields['password'], $user->password)) {
                return response()->json([
                    'message' => 'Wrong user y/o password.'
                ]);
            }
            $token = $user->createToken('MyApp')->plainTextToken;
            $response = [
                'user' => $user,
                'authenticated' => true,
                'token' => $token
            ];
            return response($response, 201);
        } catch (\Exception $e) {
            return response('Error', 400);
        }
    }

    /**
     * Logout api
     *
     * @return string
     */
    public function logout() {
        try {
            if(auth()->user()->tokens()->delete())
            {
                return true;
            } else {
                return false;
            }
            
        } catch (\Exception $e) {
            return response('Error', 400);
        }
    }
}
