<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{

    /**
     * 
     *@var string
     */
    protected $redirectTo = 'Backend/dachboard';

    public function show()
    {
        return view('Login.login');
    }

    /*
    Login logic
    */

    public function login(Request $request)
    {
        $password = $request->password;
        $login = $request->email;
        $credentials = ['email' => $login, 'password' => $password];

        #normal user =0 ; admin=1 ;sub_admin=2
        if (Auth::attempt($credentials)) {
            if (Auth()->user()->isAdmin == 1) {
                //CONNECT
                $request->session()->regenerate();
                return to_route('admin.dachboard');

            } elseif (Auth()->user()->isAdmin == 2) {
                //CONNECT
                $request->session()->regenerate();
                return to_route('commercial.dachboard');

            } else {
                //CONNECT
                $request->session()->regenerate();
                return to_route('user.dachboard');
            }
        } 
        else {
            return back()->withErrors([
                'email' => 'No user found or incorrect email/password.'
            ])->onlyInput('email');
        };
    }

    /*
    Logout
    */

    public function logout()
    {
        FacadesSession::flush();

        Auth::logout();
        return  to_route('login');
    }
}
