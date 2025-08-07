<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function login() {
        return view('auth.login');
    }

    public function registration() {
        return view('auth.registration');
    }

    public function profile() {
        $user = Auth::user();
        return view('profile' , compact('user'));
    }
}
