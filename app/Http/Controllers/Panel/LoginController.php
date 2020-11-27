<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    // Método de Autenticação
    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return Auth::user();
            return redirect()->intended('panel/user');
            // return redirect()->intended('panel/user');
        } else {
            return redirect()->intended('panel/login');
        }
    }
		
    // Método de Login
    function login() {
        return view('panel.login.view');
    }

    // Método de Deslogar
    function logout() {
        Auth::logout();
        return redirect()->route('panel.login');
    }
	
}