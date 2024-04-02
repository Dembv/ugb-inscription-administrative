<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function doLogin(LoginRequest $requete){
        
        $credentials = $requete->validated();

        if(Auth::attempt($credentials)){
            $requete->session()->regenerate();
            if(Auth::user()->role == 2)
                return redirect()->intended(route('scolarite.index'));
            else
                return redirect()->intended(route('etudiant.index'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Assurez vous d\'avoir activé votre compte',
            'password' => 'Mot de passe incorrect'
        ])->withInput(['email', 'password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
