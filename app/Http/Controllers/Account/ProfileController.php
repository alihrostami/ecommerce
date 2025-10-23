<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfilePostRequest;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Log;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $title = 'حساب کاربری';
        return view('account.profile', compact('title'));
    }

    public function post(ProfilePostRequest $request)
    {

        $inputs = $request->only([
            'first_name',
            'last_name',
            'email',
            'mobile',
        ]);
        if ($request->filled('password')) {
            $inputs['password'] = Hash::make($request->password);
        }
        try {
            Auth::user()->update($inputs);
        } catch (Exception $exception) {
            Log::error($exception);
            return back()->withErrors([
                'general' => 'خطا در پردازش . لطفا بعدا تلاش نمایید.'
            ]);
        }

        return back()->with(
            'success', 'ثبت تغییرات با موفقیت انجام شد.'
        );
    }
}
