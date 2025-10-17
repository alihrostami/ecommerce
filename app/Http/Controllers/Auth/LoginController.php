<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'ورود';
        return view('auth.login', [
            'title' => $title,
            'rawLayout' => true,
        ]);
    }

    public function post(LoginPostRequest $request)
    {

    }
}
