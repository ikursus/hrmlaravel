<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function paparBorangRegister()
    {
        return view('auth.template-register');
    }

    function saveRegistration()
    {
        return 'Pendaftaran Berjaya!';
    }
}
