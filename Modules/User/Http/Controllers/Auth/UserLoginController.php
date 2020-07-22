<?php

namespace Modules\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cache;

class UserLoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function index(Request $request)
    {
        return view('user::login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username'    => 'required',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('user')->attempt([
                'username' => $request->username, 
                'password' => $request->password
            ], $request->remember)) {

            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect()->route('user.index');
    }
}
