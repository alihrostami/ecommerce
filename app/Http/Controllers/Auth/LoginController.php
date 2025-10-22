<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        try {
            $user = User::query()
                ->where('mobile', $request->mobile)
                ->first();

        } catch (Exception $exception) {
            Log::error($exception);
            return back()->withErrors([
                'general' => 'خطا در ورود. لطقا بعدا تلاش کنید.'
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'general' => 'اطلاعات وارد شده نادرست است.'
            ]);
        }
        Auth::login($user);
        return redirect()->route('index');
    }
}
