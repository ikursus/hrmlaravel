<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Papar borang
    function paparBorangLogin() {
        return view('auth.template-login');
    }

    // Terima data darpada borang
    function checkLogin() {
        echo 'Borang berjaya dihantar';
    }
}
