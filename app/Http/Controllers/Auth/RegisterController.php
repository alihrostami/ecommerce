<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    //
    public function index()
    {
        $title = 'ثبت نام';
        return view('auth.register', [
            'title' => $title,
            'rawLayout' => true,
        ]);
    }

    public function post(RegisterPostRequest $request)
    {
        $inputs = $request->validated();
        $inputs['password'] = Hash::make($inputs['password']);
        try {
            $user = User::create($inputs);
        } catch (Exception $exception) {
            Log::error($exception);
            return back()->withErrors(
                [
                    'general' => 'خطا در ثبت نام. لطفا بعدا تلاش نمایید.',
                ]
            );
        }
        Auth::login($user);
        return redirect()->route('index');

    }
}
