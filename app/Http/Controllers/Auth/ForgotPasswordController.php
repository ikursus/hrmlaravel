<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    function paparBorangForgotPasword()
    {
        return view('auth.template-password-reset');
    }

    function requestPassword()
    {
        return 'Password Request Berjaya!';
    }
}
